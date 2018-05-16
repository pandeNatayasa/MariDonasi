@extends('layouts.formCampaignOrganisasi')

@section('home')
	{{route('organisasi.home')}}
@endsection
@section('nama_pengguna')
  {{ Auth::guard('organitation')->user()->name }}
@endsection

@section('route_pengguna')
  {{route('member.index')}}
@endsection

@section('route_logout')
  {{ route('organisasi.logout') }}
@endsection

@section('route_make_campaign')
  {{route('campaignOrganisasi.store')}}
@endsection