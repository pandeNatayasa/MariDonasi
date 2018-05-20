@extends('layouts.detail_campaign_organisasi_layouts')

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

@section('route_show_payment')
  {{route('galangDana.show',$id_campaign)}}
@endsection

