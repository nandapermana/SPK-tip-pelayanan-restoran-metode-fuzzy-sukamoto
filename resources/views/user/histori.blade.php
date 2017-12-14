@extends('master.layout')

@section('title')
        Histori
@endsection

@include('partials.header')
@section('content')

<div>
	<h3>Halaman Histori </h3> 
	<br><a href="{{route('user.home')}}" type="button" class="btn btn-primary"> Home</a><hr> 

</div>

<div class="row panel panel-default">
	  <div class="panel-heading">Histori </div>
	  <div class="panel-body">
	  		<table class="table table-hover table-responsive">
	  			<thead>
	  				<tr>
	  					<th>Id Histori</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  				<tr>
	  					<td><a href="#" type="button" class="btn btn-primary">Lihat</a>
	  				</tr>
	  			</tbody>
	  		</table>
	  </div>

</div>

@endsection