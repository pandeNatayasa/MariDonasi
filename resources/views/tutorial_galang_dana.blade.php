@extends('layouts2.tutorial_galang_dana_layouts')

@section('home')
  {{ url('/home') }}
@endsection

@section('nama_pengguna')
  {{ Auth::user()->name }}
@endsection

@section('route_logout')
  {{ route('user.logout') }}
@endsection

@section('route_create')
  {{route('campaign_user_barang.create')}}
@endsection