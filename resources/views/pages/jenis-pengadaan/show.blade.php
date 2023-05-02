@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Jenis Pengadaan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Jenis Pengadaan</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Jenis Pengadaan :</div>
        <p>{{ $jenis_pengadaan->jenis_pengadaan }}</p>
        <div>Created At :</div>
        <p>{{ $jenis_pengadaan->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $jenis_pengadaan->updated_at }}</p>
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('eproc.superadmin.jenis-pengadaan.index') }}" class="btn btn-secondary">Back</a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('eproc.admin.jenis-pengadaan.index') }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection