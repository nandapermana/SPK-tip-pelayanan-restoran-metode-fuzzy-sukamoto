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
	  					<th>Detil</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  				@foreach($hasil as $h)
	  				<tr>
	  					<td>{{$h->id}}</td>
	  					<td><a href="{{route ('user.hasil',['id_hasil'=> $h->id]) }}" type="button" class="btn btn-primary">Lihat</a></td>
	  				</tr>
	  				@endforeach
	  			</tbody>
	  		</table>
	  </div>

</div>

@endsection