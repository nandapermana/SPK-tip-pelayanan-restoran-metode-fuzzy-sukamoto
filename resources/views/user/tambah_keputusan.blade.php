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
<div class="panel panel-default">
  <div class="panel-heading"></div>

  <div class="panel-body">
  	<form action="{{route('user.tambah_keputusan')}}" method="post">
  		 <div class="form-group">
			<label> Total Biaya anda:  </label>
		  	 <input type="text" class="form-control" id="nama" placeholder="total biaya" name="total_biaya">
		  </div>
		  <div class="form-group">
			<label> Waktu Pelayanan  </label>
		  	 <input type="text" class="form-control" id="nama" placeholder="durasi pelayanan" name="durasi">
		  </div>
		    <div class="form-group">
			<label> Pilih ID Data Maximum dan Minimum  </label>
		  	 <select class="form-control" name="data">
		  	 	  @foreach($data as $d)
				  <option value="{!! $d->id !!}">{{$d->id}}</option>
				  @endforeach
		  	 </select>
		  	 <h6>Tidak tahu ID data?, silahkan cek <a href="{{route('user.data')}}">disini</a> </h6>
		  </div>
		  <button type="submit" class="btn btn-default">Simpan</button>
		  {{ csrf_field() }}
 </form>
   
  </div>
</div>


@endsection