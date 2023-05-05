@extends('templates.pages')
@section('title')
@section('header')
<h1>Edit Lelang</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Lelang</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('eproc.superadmin.lelang.update', $lelang->id) }}" class="needs-validation" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('eproc.admin.lelang.update', $lelang->id) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Jenis Pengadaan</label>
            <select class="form-control" name="jenis_pengadaan_id">
              <option selected value="{{ $lelang->jenis_pengadaan_id }}">{{ $lelang->jenis_pengadaans->jenis_pengadaan }}</option>
              @foreach ($jenis_pengadaan as $jenis_pengadaans)
                @if($jenis_pengadaans->status_aktif == 'aktif')
                  <option value="{{ $jenis_pengadaans->id }}">{{ $jenis_pengadaans->jenis_pengadaan }}</option>
                @endif
              @endforeach
              @error('jenis_pengadaan_id')<div class="text-danger">{{ $message }}</div>@enderror
            </select>
          </div>
          <div class="form-group">
            <label for="nama_lelang">Nama Lelang</label>
            <input id="nama_lelang" type="text" class="form-control" name="nama_lelang" value="{{ $lelang->nama_lelang }}">
            @error('nama_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="urian_singkat_pekerjaan">Uraian Singkat Pekerjaan</label>
            <input id="urian_singkat_pekerjaan" type="text" class="form-control" name="urian_singkat_pekerjaan" value="{{ $lelang->urian_singkat_pekerjaan }}">
            @error('urian_singkat_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="tanggal_mulai_lelang">Tanggal Mulai Lelang</label>
            <input id="tanggal_mulai_lelang" type="date" class="form-control" name="tanggal_mulai_lelang" value="{{ $lelang->tanggal_mulai_lelang }}">
            @error('tanggal_mulai_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="tanggal_akhir_lelang">Tanggal Akhir Lelang</label>
            <input id="tanggal_akhir_lelang" type="date" class="form-control" name="tanggal_akhir_lelang" value="{{ $lelang->tanggal_akhir_lelang }}">
            @error('tanggal_akhir_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="jenis_kontrak">Jenis Kontrak</label>
            <input id="jenis_kontrak" type="text" class="form-control" name="jenis_kontrak" value="{{ $lelang->jenis_kontrak }}">
            @error('jenis_kontrak')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="lokasi_pekerjaan">Lokasi Pekerjaan</label>
            <input id="lokasi_pekerjaan" type="text" class="form-control" name="lokasi_pekerjaan" value="{{ $lelang->lokasi_pekerjaan }}">
            @error('lokasi_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="hps">HPS</label>
            <input id="hps" type="number" class="form-control" name="hps" value="{{ $lelang->hps }}" onkeyup="formatNumber(this)">
            @error('hps')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="syarat_kualifikasi">Syarat Kualifikasi</label>
            <textarea id="syarat_kualifikasi" class="form-control ckeditor" name="syarat_kualifikasi">{{ $lelang->syarat_kualifikasi }}</textarea>
            @error('syarat_kualifikasi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="section-title mt-0">Additional Lampiran Pengadaan</div>
          <div class="form-group">
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="nama_perusahaan" name="nama_perusahaan" value="aktif" {{ $additional_lampiran_pengadaan->nama_perusahaan == 'aktif' ? 'checked': '' }}>
              <label class="custom-control-label" for="nama_perusahaan">Nama Perusahaan</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="email_perusahaan" name="email_perusahaan" value="aktif" {{ $additional_lampiran_pengadaan->email_perusahaan == 'aktif' ? 'checked': '' }}>
              <label class="custom-control-label" for="email_perusahaan">Email Perusahaan</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="alamat_perusahaan" name="alamat_perusahaan" value="aktif" {{ $additional_lampiran_pengadaan->alamat_perusahaan == 'aktif' ? 'checked': '' }}>
              <label class="custom-control-label" for="alamat_perusahaan">Alamat Perusahaan</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="pengajuan_anggaran" name="pengajuan_anggaran" value="aktif" {{ $additional_lampiran_pengadaan->pengajuan_anggaran == 'aktif' ? 'checked': '' }}>
              <label class="custom-control-label" for="pengajuan_anggaran">Pengajuan Anggaran</label>
            </div>
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.lelang.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.lelang.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection