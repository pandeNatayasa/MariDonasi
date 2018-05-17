@extends('layouts.detail_campaign_user_layouts')

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

@section('route_show_payment')
  {{route('galangDana.show',$id_campaign)}}
@endsection

