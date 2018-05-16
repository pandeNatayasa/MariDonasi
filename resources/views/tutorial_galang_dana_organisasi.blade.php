@extends('layouts2.tutorial_galang_dana_layouts')

@section('home')
  {{ route('organisasi.home') }}
@endsection

@section('nama_pengguna')
   {{ Auth::guard('organitation')->user()->name }}
@endsection

@section('route_logout')
  {{ route('organisasi.logout') }}
@endsection

@section('route_create')
  {{route('campaign_organisasi_barang.create')}}
@endsection


@section('profil_pengguna')
	{{route('profille-organisasi.index')}}
@endsection