<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Data;
use App\hasil;
use App\test;
use App\Http\Requests;

class UserController extends Controller
{
    //
    public function getHome(){
    	return view('welcome');
    }

    public function postLogin(Request $req){

    	$this->validate($req, [
            'email'     => 'email|required',
            'password'  => 'required|min:4'
         ]);


        if (Auth::attempt( ['email'=> $req->input('email'),'password'=>$req->input('password')] )   )
         {
             if (Session::has('oldUrl')){
                 $oldUrl = Session::get('oldUrl');
                 Session::forget('oldUrl');
                 return redirect()->to($oldUrl);
             }
             
             return redirect()->route('user.home');//bila login sukses ke halaman profile
         }

         else{
         	$message = 'akun dan pasword tidak tepat atau akun tidak ada';
         	return redirect()->back()->with(['error_login_message'=> $message]);
         }


    }

    public function getLogout(){
    	Auth::logout();
        return redirect()->route('guest.home');
    }

    public function getProfile(){
    	return view('user.user_page');
    }

    public function getTambahKeputusan(){
        $id = Auth::user()->id;
        $data= Data::where('user_id',$id)->get();
    	return view('user.tambah_keputusan')->with(['data' => $data]);
    }

    public function getHistori(){
        $id_user = Auth::user()->id;
        $hasil= hasil::where('user_id',$id_user)->get();
    	return view('user.histori')->with(['hasil'=> $hasil]);
    }

    public function getData(){
        $id = Auth::user()->id;
        $data= Data::where('user_id',$id)->get();
        return view('user.data')->with(['data' => $data]);
    }

    public function postData(Request $req){
        $this->validate($req, [
            'bayar-max'     => 'numeric|required|min:1000|max:10000000',
            'bayar-min'     => 'numeric|required|min:0   |max:1000000',
            'tips-max'      => 'numeric|required|min:1000|max:1000000',
            'tips-min'      => 'numeric|required|min:0   |max:1000000',
            'layan-max'     => 'numeric|required|min:1   |max:100',
            'layan-min'     => 'numeric|required|min:1   |max:100',
         ]);
        $data= new Data();
        $data->pembayaran_tertinggi = $req->input('bayar-max');
        $data->pembayaran_terendah  = $req->input('bayar-min');

        $data->tips_tertinggi = $req->input('tips-max');
        $data->tips_terendah = $req->input('tips-min');

        $data->pelayanan_tertinggi = $req->input('layan-max');
        $data->pelayanan_terendah = $req->input('layan-min');

        $data->user_id= Auth::user()->id;
        $data->save();

        $message="data berhasil dibuat";
        return redirect()->route('user.home')->with(['message' => $message]);

    }

    public function postTambahKeputusan(Request $req){
        $this->validate($req,[
            'total_biaya' => 'numeric|required|min:1000|max:10000000',
            'durasi'      => 'numeric|required|min:1   |max:100'
        ]);
        $total_biaya= $req->input('total_biaya');
        $durasi = $req->input('durasi');

        $id_data   = $req->get('data');
        $data = Data::find($id_data);

        //-----------FUZZY TSUKAMOTO---------------


        //Nilai Keanggoataan pembayaran 
        //fuzzyfikasi

        $bayar_max = $data->pembayaran_tertinggi;
        $bayar_min = $data->pembayaran_terendah;
        $pembagi_bayar = $bayar_max-$bayar_min;

        $miu_bayar_rendah=($bayar_max-$total_biaya)/$pembagi_bayar;
        $miu_bayar_tinggi=($total_biaya-$bayar_min)/$pembagi_bayar;

        //Nilai Keanggoataan pelayanan
        $layan_max = $data->pelayanan_tertinggi;
        $layan_min = $data->pelayanan_terendah;
        $pembagi_layan = $layan_min-$layan_max;

        $miu_layan_tinggi=($layan_min-$durasi)/$pembagi_layan;
        $miu_layan_rendah=($durasi-$layan_max)/$pembagi_layan;

        //Nilai Keanggoataan tips
        $tips_max = $data->tips_tertinggi;
        $tips_min = $data->tips_terendah;
        $pembagi_tips = $tips_max-$tips_min;

        //$miu_tips_rendah=($tips_max-$total_biaya)/$pembagi_tips;
        //$miu_tips_tinggi=($tips_min-$total_biaya)/$pembagi_tips;


        //INFERENSI RULES 

        $a1=0;
        if ($miu_bayar_rendah>$miu_layan_rendah) {
            # code...
            $a1=$miu_layan_rendah;
        }
        else{
            $a1=$miu_bayar_rendah;
        }

        $z1= $tips_max-$a1*($tips_max-$tips_min);

        $a2=0;
        if ($miu_bayar_rendah > $miu_layan_tinggi) {
            # code...
            $a2= $miu_layan_tinggi;
        }
        else{
            $a2= $miu_bayar_rendah;
        }
        $z2= $tips_max-$a2*($tips_max-$tips_min);

        $a3=0;
        if ($miu_bayar_tinggi > $miu_layan_rendah) {
            # code...
            $a3= $miu_layan_rendah;
        }
        else{
            $a3= $miu_bayar_tinggi;
        }
        $z3= $tips_max-$a3*($tips_max-$tips_min);

        $a4=0;
        if ($miu_bayar_tinggi > $miu_layan_tinggi) {
            # code...
            $a4= $miu_layan_tinggi;
        }
        else{
            $a4= $miu_bayar_rendah;
        }
         $z4= $tips_max-$a4*($tips_max-$tips_min);

         //OUTPUT CRISPT , DEFUZZYFIKASI

         $x1=($a1*$z1);
         $x2=($a2*$z2);
         $x3=($a3*$z3);
         $x4=($a4*$z4);
         $x5=($a1+$a2+$a3+$a4);
         $x6=($x1+$x2+$x3+$x4);
         $x7= $x6/$x5;

         $z= $x7;

        
         
         $hasil = new hasil();
         $hasil->hasil = $z;
         $hasil->total_biaya = $total_biaya;
         $hasil->durasi = $durasi;
         $hasil->data_id = $id_data;
         $hasil->user_id = Auth::user()->id;
         
        
         $hasil->save();

         $success_message= 'Data berhasil ditambah';
        return redirect()->route('user.home')->with(['success_message'=> $success_message]);
    }

    public function getHasil($id_hasil){
        $hasil = hasil::find($id_hasil);
        $data_id = $hasil->data_id;
        $data = Data::find($data_id);
        return view('user.halaman_hasil')->with(['hasil'=> $hasil , 'data' => $data ]);
    }

    public function getEdit($id_hasil){
        $data=  data::find($id_hasil);

         return view('user.edit')->with(['data' => $data]);
    }

    public function postEdit($id_data, Request $req ){
         $this->validate($req, [
            'bayar-max'     => 'numeric|required|min:1000|max:10000000',
            'bayar-min'     => 'numeric|required|min:0   |max:1000000',
            'tips-max'      => 'numeric|required|min:1000|max:1000000',
            'tips-min'      => 'numeric|required|min:0   |max:1000000',
            'layan-max'     => 'numeric|required|min:-1',
            'layan-min'     => 'numeric|required|min:-1',
         ]);

        $data= Data::find($id_data);
        $data->pembayaran_tertinggi = $req->input('bayar-max');
        $data->pembayaran_terendah  = $req->input('bayar-min');

        $data->tips_tertinggi = $req->input('tips-max');
        $data->tips_terendah = $req->input('tips-min');

        $data->pelayanan_tertinggi = $req->input('layan-max');
        $data->pelayanan_terendah = $req->input('layan-min');

        $data->user_id= Auth::user()->id;
        $data->save();

        $message="data berhasil dibuat";
        return redirect()->route('user.data')->with(['message' => $message]);

    }

    public function getAlert($id_data){
        $data = Data::find($id_data);
        return view('user.alert')->with(['data' => $data]);
        /*
        $buku->delete();
        $message = "Data berhasil di hapus";
        return redirect()->back()->with(['success_message'=> $message]);*/
    }

    public function getDelete($id_data){
        $data = Data::find($id_data);
        $hasil = hasil::where('data_id',$id_data)->get();

        foreach ($hasil as $h) {
            if ($h->data_id == $id_data) {
                $h->delete();
            }
        }

        $data->delete();
        
        $message = "Data berhasil di hapus";
        return redirect()->route('user.data')->with(['success_message'=> $message]);
    }


}
