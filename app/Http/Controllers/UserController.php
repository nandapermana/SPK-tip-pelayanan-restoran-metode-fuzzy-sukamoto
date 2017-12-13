<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

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
    	return view('user.tambah_keputusan');
    }

    public function getHistori(){
    	return view('user.histori');
    }
}
