@extends('layouts.payment_barang_layouts')

@section('home')
  {{ url('/organisasi') }}
@endsection

@section('route_galangDana')
  {{route('galangDanaOrganisasi.index')}}
@endsection

@section('nama_user')
  {{ Auth::guard('organitation')->user()->name }}
@endsection

@section('route_user')
  {{route('profille-organisasi.index')}}
@endsection

@section('logout')
  {{ route('organisasi.logout') }}
@endsection

@section('galangDana_store')
  {{route('galangBarangUserForOrganisasi.store')}}
@endsection

