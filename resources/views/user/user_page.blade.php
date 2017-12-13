@extends('master.layout')

@section('title')
        Halaman User {{ Auth::user()->name }} 
@endsection

@include('partials.header')
@section('content')
<div class="page-header">
  <h1>Sistem Pendukung Keputusan untuk Tip pelayan restoran <small>Silahkan pilih menu</small></h1>
</div>
<a href="{{route('user.tambah')}}" type="button" class="btn btn-primary btn-lg btn-block">Cek keputusan</a>
<a href="{{route('user.histori')}}" type="button" class="btn btn-primary btn-lg btn-block">Histori </a>
        
@endsection