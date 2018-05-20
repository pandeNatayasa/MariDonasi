@extends('layouts.detail_campaign_layouts2')

@section('home')
  {{ url('/home') }}
@endsection

@section('route_galangDana')
  {{route('galangDanaOrganisasiToUser.index')}}
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

@section('route_show_payment')
  {{route('galangDanaOrganisasiToUser.show',$id_campaign)}}
@endsection


