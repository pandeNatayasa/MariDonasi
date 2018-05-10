@extends('layouts.formCampaign')


@section('home')
	{{route('home')}}
@endsection

@section('nama_pengguna')
  {{ Auth::user()->name }}
@endsection

@section('route_pengguna')
  {{route('member.index')}}
@endsection

@section('route_logout')
  {{ route('user.logout') }}
@endsection

@section('route_make_campaign')
  {{route('campaignUser.store')}}
@endsection