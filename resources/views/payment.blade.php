@extends('layouts.payment_layouts')

@section('home')
  {{ url('/home') }}
@endsection

@section('route_galangDana')
  {{route('galangDana.index')}}
@endsection

@section('nama_user')
  {{ Auth::user()->name }}
@endsection

@section('route_user')
  {{route('member.index')}}
@endsection

@section('logout')
  {{ route('user.logout') }}
@endsection

@section('galangDana_store')
  {{route('galangDana.store')}}
@endsection

