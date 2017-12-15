@extends('master.layout')

@section('title')
        Hasil
@endsection

@include('partials.header')
@section('content')
<br><a href="{{route('user.home')}}" type="button" class="btn btn-primary"> Home</a><hr> 

<div class="page-header">
  <h1><small> Hasil keputusan</small></h1>
</div>
<h4> <span class="label label-default">Data terkait:</span></h4>
<ul class="list-group">
  <li class="list-group-item">Pembayaran Tertinggi: Rp.{{$data->pembayaran_tertinggi}}</li>
  <li class="list-group-item">Pembayaran Terendah : Rp.{{$data->pembayaran_terendah}}</li>
  <li class="list-group-item">Pelayanan Terlama   : {{$data->pelayanan_terendah}} Menit</li>
  <li class="list-group-item">Pelayanan Tercepat  : {{$data->pelayanan_tertinggi}}Menit</li>
  <li class="list-group-item">Tips Tertinggi      : Rp.{{$data->tips_tertinggi}}</li>
  <li class="list-group-item">Tips Terendah       : Rp.{{$data->tips_terendah}}</li>
</ul>
<hr>
<h4> <span class="label label-default">Keputusan Akhir dengan fuzzy :</span></h4>
<div class="well well-lg"> 
	 Tips yang bisa anda berikan pada pelayan : <b>Rp.{{$hasil->hasil}}</b>
</div>
@endsection