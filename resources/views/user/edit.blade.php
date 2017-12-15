@extends('master.layout')

@section('title')
        Halaman Edit
@endsection
@include('partials.header')
@section('content')

<hr>
<a href="{{route('user.home')}}" type="button" class="btn btn-primary ">Home</a>
<div class="row">
   <div class="col-md-12"><br></div>
   <div class="col-md-12"><br></div>

</div>
@include('partials.notif')
<div class="panel panel-default">
  <div class="panel-heading">Edit Data</div>

  <div class="panel-body">
  	<form action="{{route('user.edit' , ['id_data'=> $data->id])}}" method="post" >
		    <div class="row">
			  <div class="col-xs-2">
			   <label> Pembayaran </label>
			  </div>
			  <div class="col-xs-4">
			   <input type="text" class="form-control" id="bayar-max" value="{{$data->pembayaran_tertinggi}}" name="bayar-max">
			  </div>
			  <div class="col-xs-4">
			     <input type="text" class="form-control" id="bayar-min" value="{{$data->pembayaran_terendah}}" name="bayar-min">
			  </div>
			</div>
			<hr>
			<div class="row">
			  <div class="col-xs-2">
			   <label> Tips </label> 
			  </div>
			  <div class="col-xs-4">
			    <input type="text" class="form-control" id="tips-max"  value="{{$data->tips_tertinggi}}" name="tips-max">
			  </div>
			  <div class="col-xs-4">
			    <input type="text" class="form-control" id="tips-min" value="{{$data->tips_terendah}}" name="tips-min">
			  </div>
			</div>
			<hr>
			<div class="row">
			  <div class="col-xs-2">
			   <label> Pelayanan </label>
			  </div>
			  <div class="col-xs-4">
			    <input type="text" class="form-control" id="layan-max" value="{{$data->pelayanan_tertinggi}}" name="layan-max">
			  </div>
			  <div class="col-xs-4">
			    <input type="text" class="form-control" id="layan-min" value="{{$data->pelayanan_terendah}}" name="layan-min">
			  </div>
			</div>
		 
		  <button type="submit" class="btn btn-default">Simpan</button>
		  {{ csrf_field() }}
 </form>

