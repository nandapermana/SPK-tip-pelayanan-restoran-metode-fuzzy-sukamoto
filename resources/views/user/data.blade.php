@extends('master.layout')

@section('title')
        Tambah Pendukung Keputusan
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
  <div class="panel-heading">Tambah Data</div>

  <div class="panel-body">
  	<form action="{{route('user.data')}}" method="post" >
		    <div class="row">
			  <div class="col-xs-2">
			   <label> Pembayaran </label>
			  </div>
			  <div class="col-xs-4">
			   <input type="text" class="form-control" id="bayar-max" placeholder="Total Pembayaran maksimum" name="bayar-max">
			  </div>
			  <div class="col-xs-4">
			     <input type="text" class="form-control" id="bayar-min" placeholder="Total Pembayaran minimum" name="bayar-min">
			  </div>
			</div>
			<hr>
			<div class="row">
			  <div class="col-xs-2">
			   <label> Tips </label> 
			  </div>
			  <div class="col-xs-4">
			    <input type="text" class="form-control" id="tips-max" placeholder="Total Tips maksimum" name="tips-max">
			  </div>
			  <div class="col-xs-4">
			    <input type="text" class="form-control" id="tips-min" placeholder="Total tips minimum" name="tips-min">
			  </div>
			</div>
			<hr>
			<div class="row">
			  <div class="col-xs-2">
			   <label> Pelayanan </label>
			  </div>
			  <div class="col-xs-4">
			    <input type="text" class="form-control" id="layan-max" placeholder="Total Pelayanan maksimum" name="layan-max">
			  </div>
			  <div class="col-xs-4">
			    <input type="text" class="form-control" id="layan-min" placeholder="Total Pelayanan minimum" name="layan-min">
			  </div>
			</div>
		 
		  <button type="submit" class="btn btn-default">Simpan</button>
		  {{ csrf_field() }}
 </form>


   
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Dataa</div>

  <div class="panel-body"></div>
  <table class="table table-hover">
  	<thead>
  		 <tr>
  		 	<th> ID </th>
  		 	<th> Pembayaran max</th>
  		 	<th> Pembayaran min</th>
  		 	<th> Pelayanan max</th>
  		 	<th> Pelayanan min</th>
  		 	<th> tips max</th>
  		 	<th> tips min</th>
  		 </tr>
  	</thead>
  	<tbody>
  		@foreach($data as $d)
  		<tr>
  			<td>{{$d->id}}</td>
  			<td>{{$d->pembayaran_tertinggi}}</td>
  			<td>{{$d->pembayaran_terendah}}</td>
  			<td>{{$d->pelayanan_tertinggi}}</td>
  			<td>{{$d->pelayanan_terendah}}</td>
  			<td>{{$d->tips_tertinggi}}</td>
  			<td>{{$d->tips_terendah}}</td>
  		</tr>
  		@endforeach
  	</tbody>
  </table>

  </div>



@endsection