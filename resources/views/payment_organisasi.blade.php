@extends('layouts.payment_layouts')

@section('home')
  {{ route('organisasi.home') }}
@endsection

@section('route_galangDana')
  {{route('galangDanaUserToOrganisasi.index')}}
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
  {{route('galangDanaUserToOrganisasi.store')}}
@endsection