@extends('layouts2.intermeso_layouts')

@section('home')
  {{ route('organisasi.home') }}
@endsection

@section('nama_pengguna')
  {{ Auth::guard('organitation')->user()->name }}
@endsection

@section('route_logout')
  {{ route('organisasi.logout') }}
@endsection

@section('route_home')
  {{ route('organisasi.home') }}
@endsection