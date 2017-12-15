@extends('master.layout')

@section('title')
        Histori
@endsection

@include('partials.header')
@section('content')

<hr>
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
  <span class="sr-only"> </span>
  Anda yakin ingin menghapus data?<br>
  Semua Hasil terkait dengan data yang diapus akan ikut terhapus juga.<br>
  Lanjutkan?
</div>
<a href="{{route('user.data')}}" class="btn btn-default" type="button">Tidak</a>
<a href="{{route('user.delete', ['id_data' => $data->id])}}" class="btn btn-danger" type="button">Ya, saya yakin</a>

@endsection