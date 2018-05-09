@extends('layouts2.intermeso_layouts')

@section('home')
  {{ url('/home') }}
@endsection

@section('nama_pengguna')
  {{ Auth::user()->name }}
@endsection

@section('route_logout')
  {{ route('user.logout') }}
@endsection

@section('route_home')
  {{ route('home') }}
@endsection