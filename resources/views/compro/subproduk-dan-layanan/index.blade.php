@extends('templates.pages')
@section('title', 'Subproduk Dan Layanan')
@section('header')
<h1>Subproduk Dan Layanan : {{ $produk_dan_layanan->judul }}</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    
    @if(Session::get('success'))
      <div class="alert alert-primary">{{ Session::get('success') }}</div>
    @endif

    @if(Session::get('fail'))
      <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif

    <div class="card">
      <div class="card-body">
        <div class="float-left">
          @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('compro.superadmin.produk-dan-layanan.index', Crypt::encrypt($produk_dan_layanan->id)) }}" class="btn btn-primary"><i class="fas fa-times"></i></a>
            <a href="{{ route('compro.superadmin.subproduk-dan-layanan.create', Crypt::encrypt($produk_dan_layanan->id)) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
          <a href="{{ route('compro.admin.produk-dan-layanan.index', Crypt::encrypt($produk_dan_layanan->id)) }}" class="btn btn-primary"><i class="fas fa-times"></i></a>
            <a href="{{ route('compro.admin.subproduk-dan-layanan.create', Crypt::encrypt($produk_dan_layanan->id)) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
        </div>
        <div class="float-right">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-append">                                            
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
  
        <div class="clearfix mb-3"></div>
  
        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($subproduk_dan_layanans as $subproduk_dan_layanan)
              <?php $id++; ?>
              <tr>
                <td>{{ $id }}</td>
                <td><img src="{{ asset('compro/subproduk-dan-layanan/thumbnail/'.$subproduk_dan_layanan["thumbnail"]) }}" width="200px" alt=""></td>
                <td>{{ $subproduk_dan_layanan->judul }}</td>
                <td>{!! $subproduk_dan_layanan->deskripsi !!}</td>
                <td style="white-space: nowrap">
                  @if(auth()->user()->level == 'superadmin')
                    <form action="{{ route('compro.superadmin.subproduk-dan-layanan.destroy', ['produk_dan_layanan_id' => Crypt::encrypt($produk_dan_layanan->id), 'id' => Crypt::encrypt($subproduk_dan_layanan->id)]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('compro.superadmin.subproduk-dan-layanan.show', ['produk_dan_layanan_id' => Crypt::encrypt($produk_dan_layanan->id), 'id' => Crypt::encrypt($subproduk_dan_layanan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      <a href="{{ route('compro.superadmin.subproduk-dan-layanan.edit', ['produk_dan_layanan_id' => Crypt::encrypt($produk_dan_layanan->id), 'id' => Crypt::encrypt($subproduk_dan_layanan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                      <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                    </form>
                  @endif
                  @if(auth()->user()->level == 'admin')
                    <form action="{{ route('compro.admin.subproduk-dan-layanan.destroy', ['produk_dan_layanan_id' => Crypt::encrypt($produk_dan_layanan->id), 'id' => Crypt::encrypt($subproduk_dan_layanan->id)]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('compro.admin.subproduk-dan-layanan.show', ['produk_dan_layanan_id' => Crypt::encrypt($produk_dan_layanan->id), 'id' => Crypt::encrypt($subproduk_dan_layanan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      <a href="{{ route('compro.admin.subproduk-dan-layanan.edit', ['produk_dan_layanan_id' => Crypt::encrypt($produk_dan_layanan->id), 'id' => Crypt::encrypt($subproduk_dan_layanan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                      <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                    </form>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="float-right">
          {{ $subproduk_dan_layanans->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection