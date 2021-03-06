@extends('layouts.detail_campaign_layouts')

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

@section('route_show_payment')
  {{route('galangDanaUserToOrganisasi.show',$id_campaign)}}
@endsection

@section('route_show_payment_barang')
	{{route('galangBarangUserForOrganisasi.show',$id_campaign)}}
@endsection