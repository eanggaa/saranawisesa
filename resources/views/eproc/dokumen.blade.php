@extends('templates.pages')
@section('title', 'Akta Pendirian')
@section('header')
<h1>Akta Pendirian</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">

    <div class="card">
      @include('eproc.profile')
    </div>

    <div class="card">
      @include('eproc.menu')
    </div>

    @if(Session::get('success'))
      <div class="alert alert-primary">{{ Session::get('success') }}</div>
    @endif

    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Tipe Dokumen</th>
                <th>Berkas Dokumen</th>
                <th>No. Dokumen</th>
                <th>Tanggal Terbit</th>
                <th>Tanggal Kadaluarsa</th>
              </tr>
              <tr>
                <td>1</td>
                <td style="white-space: nowrap">
                  @if(!empty($akta_pendirian))
                  <form method="POST" action="{{ route('eproc.perusahaan.delete-akta-pendirian', Crypt::encrypt($akta_pendirian->id)) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                    @csrf
                    @method('DELETE')
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#akta-pendirian2"><i class="fa fa-pen"></i></button>
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#akta-pendirian3"><i class="fa fa-eye"></i></button>
                      <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                    </form>
                  @else
                    <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#akta-pendirian"><i class="fa fa-plus"></i></button>
                  @endif
                </td>
                @if(!empty($akta_pendirian))
                  <td style="white-space: nowrap">Akta Pendirian <span class="text-danger">*wajib</span></td>
                  <td><a href="{{ asset('eproc/akta-pendirian/akta/'.$akta_pendirian["akta"]) }}" target="_blank">{{ Str::limit($akta_pendirian->akta, 20) }}</a></td>
                  <td>{{ Str::limit($akta_pendirian->no_dokumen, 20) }}</td>
                  <td></td>
                  <td></td>
                @else
                  <td style="white-space: nowrap">Akta Pendirian <span class="text-danger">*wajib</span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                @endif
              </tr>
              <tr>
                <td>2</td>
                <td style="white-space: nowrap">
                  <button type="button" class="btn btn-primary btn-icon text-white"><i class="fa fa-pen"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-keterangan-domisili-perusahaan"><i class="fa fa-eye"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                </td>
                <td>Surat Keterangan Domisili Perusahaan (SKDP) <span class="text-danger">*wajib</span></td>
                <td>Nama_dokumen.pdf</td>
                <td>001</td>
                <td>01/06/2023</td>
                <td>01/06/2024</td>
              </tr>
              <tr>
                <td>3</td>
                <td style="white-space: nowrap">
                  <button type="button" class="btn btn-primary btn-icon text-white"><i class="fa fa-pen"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-izin-usaha-perdagangan"><i class="fa fa-eye"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                </td>
                <td>Surat Izin Usaha Perdagangan (SIUP) <span class="text-danger">*wajib</span></td>
                <td>Nama_dokumen.pdf</td>
                <td>001</td>
                <td>01/06/2023</td>
                <td>01/06/2024</td>
              </tr>
              <tr>
                <td>4</td>
                <td style="white-space: nowrap">
                  <button type="button" class="btn btn-primary btn-icon text-white"><i class="fa fa-pen"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#nomor-induk-berusaha"><i class="fa fa-eye"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                </td>
                <td>Nomor Induk Berusaha (NIB) <span class="text-danger">*wajib</span></td>
                <td>Nama_dokumen.pdf</td>
                <td>001</td>
                <td>01/06/2023</td>
                <td></td>
              </tr>
              <tr>
                <td>5</td>
                <td style="white-space: nowrap">
                  <button type="button" class="btn btn-primary btn-icon text-white"><i class="fa fa-pen"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#nomor-pokok-wajib-pajak"><i class="fa fa-eye"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                </td>
                <td>Nomor Pokok Wajib Pajak (NPWP) <span class="text-danger">*wajib</span></td>
                <td>Nama_dokumen.pdf</td>
                <td>001</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>6</td>
                <td style="white-space: nowrap">
                  <button type="button" class="btn btn-primary btn-icon text-white"><i class="fa fa-pen"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-pengukuhan-perusahaan-kena-pajak"><i class="fa fa-eye"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                </td>
                <td>Surat Pengukuhan Perusahaan Kena Pajak (SPPKP)</td>
                <td>Nama_dokumen.pdf</td>
                <td>001</td>
                <td>01/06/2023</td>
                <td></td>
              </tr>
              <tr>
                <td>7</td>
                <td style="white-space: nowrap">
                  <button type="button" class="btn btn-primary btn-icon text-white"><i class="fa fa-pen"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-izin-operasional"><i class="fa fa-eye"></i></button>
                  <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                </td>
                <td>Surat Izin Operasional (SIO)</td>
                <td>Nama_dokumen.pdf</td>
                <td>001</td>
                <td>01/06/2023</td>
                <td>01/06/2024</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="akta-pendirian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Akta Pendirian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-akta-pendirian') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>No. Akta</label>
            <input type="text" class="form-control" name="no_akta">
          </div>
          <div class="form-group">
            <label>Tanggal Akta</label>
            <input type="date" class="form-control" name="tanggal_akta">
          </div>
          <div class="form-group">
            <label>Nama Notaris</label>
            <input type="text" class="form-control" name="nama_notaris">
          </div>
          <div class="form-group">
            <label>No. SK</label>
            <input type="text" class="form-control" name="no_sk">
          </div>
          <div class="form-group">
            <label>Tanggal SK</label>
            <input type="date" class="form-control" name="tanggal_sk">
          </div>
          <div class="form-group">
            <label>Upload Akta</label>
            <input type="file" class="form-control" name="akta">
          </div>
          <div class="form-group">
            <label>Upload SK</label>
            <input type="file" class="form-control" name="sk">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="akta-pendirian2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Akta Pendirian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($akta_pendirian))
        <form method="POST" action="{{ route('eproc.perusahaan.put-akta-pendirian', Crypt::encrypt($akta_pendirian->id)) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="form-group">
              <label>No. Akta</label>
              <input type="text" class="form-control" name="no_akta" value="{{ $akta_pendirian->no_akta }}">
            </div>
            <div class="form-group">
              <label>Tanggal Akta</label>
              <input type="date" class="form-control" name="tanggal_akta" value="{{ $akta_pendirian->tanggal_akta }}">
            </div>
            <div class="form-group">
              <label>Nama Notaris</label>
              <input type="text" class="form-control" name="nama_notaris" value="{{ $akta_pendirian->nama_notaris }}">
            </div>
            <div class="form-group">
              <label>No. SK</label>
              <input type="text" class="form-control" name="no_sk" value="{{ $akta_pendirian->no_sk }}">
            </div>
            <div class="form-group">
              <label>Tanggal SK</label>
              <input type="date" class="form-control" name="tanggal_sk" value="{{ $akta_pendirian->tanggal_sk }}">
            </div>
            <div class="form-group">
              <label>Upload Akta</label>
              <input type="file" class="form-control" name="akta" value="{{ $akta_pendirian->akta }}">
              <div><a href="{{ asset('eproc/akta-pendirian/akta/'.$akta_pendirian["akta"]) }}" target="_blank">{{ $akta_pendirian->akta }}</a></div>
            </div>
            <div class="form-group">
              <label>Upload SK</label>
              <input type="file" class="form-control" name="sk" value="{{ $akta_pendirian->sk }}">
              <div><a href="{{ asset('eproc/akta-pendirian/sk/'.$akta_pendirian["sk"]) }}" target="_blank">{{ $akta_pendirian->sk }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

<div class="modal fade" id="akta-pendirian3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Akta Pendirian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($akta_pendirian))
        <form action="">
          <div class="modal-body">
            <div class="form-group">
              <label>No. Akta</label>
              <input disabled type="text" class="form-control" name="no_akta" value="{{ $akta_pendirian->no_akta }}">
            </div>
            <div class="form-group">
              <label>Tanggal Akta</label>
              <input disabled type="date" class="form-control" name="tanggal_akta" value="{{ $akta_pendirian->tanggal_akta }}">
            </div>
            <div class="form-group">
              <label>Nama Notaris</label>
              <input disabled type="text" class="form-control" name="nama_notaris" value="{{ $akta_pendirian->nama_notaris }}">
            </div>
            <div class="form-group">
              <label>No. SK</label>
              <input disabled type="text" class="form-control" name="no_sk" value="{{ $akta_pendirian->no_sk }}">
            </div>
            <div class="form-group">
              <label>Tanggal SK</label>
              <input disabled type="date" class="form-control" name="tanggal_sk" value="{{ $akta_pendirian->tanggal_sk }}">
            </div>
            <div class="form-group">
              <label>Upload Akta</label>
              <input disabled type="file" class="form-control" name="akta" value="{{ $akta_pendirian->akta }}">
              <div><a href="{{ asset('eproc/akta-pendirian/akta/'.$akta_pendirian["akta"]) }}" target="_blank">{{ $akta_pendirian->akta }}</a></div>
            </div>
            <div class="form-group">
              <label>Upload SK</label>
              <input disabled type="file" class="form-control" name="sk" value="{{ $akta_pendirian->sk }}">
              <div><a href="{{ asset('eproc/akta-pendirian/sk/'.$akta_pendirian["sk"]) }}" target="_blank">{{ $akta_pendirian->sk }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

<div class="modal fade" id="surat-keterangan-domisili-perusahaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Keterangan Domisili Perusahaan (SKDP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>No. SKDP</label>
          <input disabled type="text" class="form-control" name="no_skdp" value="">
        </div>
        <div class="form-group">
          <label>Tanggal Terbit</label>
          <input disabled type="date" class="form-control" name="tanggal_terbit" value="">
        </div>
        <div class="form-group">
          <label>Tanggal Jatuh Tempo</label>
          <input disabled type="date" class="form-control" name="tanggal_jatuh_tempo" value="">
        </div>
        <div class="form-group">
          <label>Upload SKDP</label>
          <input disabled type="file" class="form-control" name="upload_skdp" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="surat-izin-usaha-perdagangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Izin Usaha Perdagangan (SIUP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>No. SIUP</label>
          <input disabled type="text" class="form-control" name="no_siup" value="">
        </div>
        <div class="form-group">
          <label>Tanggal Terbit</label>
          <input disabled type="date" class="form-control" name="tanggal_terbit" value="">
        </div>
        <div class="form-group">
          <label>Tanggal Jatuh Tempo</label>
          <input disabled type="date" class="form-control" name="tanggal_jatuh_tempo" value="">
        </div>
        <div class="form-group">
          <label>Upload SIUP</label>
          <input disabled type="file" class="form-control" name="upload_siup" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="nomor-induk-berusaha" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nomor Induk Berusaha (NIB)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tanggal Terbit</label>
          <input disabled type="date" class="form-control" name="tanggal_terbit" value="">
        </div>
        <div class="form-group">
          <label>Upload NIB</label>
          <input disabled type="file" class="form-control" name="upload_nib" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="nomor-pokok-wajib-pajak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nomor Pokok Wajib Pajak (NPWP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Upload NPWP</label>
          <input disabled type="file" class="form-control" name="upload_npwp" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="surat-pengukuhan-perusahaan-kena-pajak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Pengukuhan Perusahaan Kena Pajak (SPPKP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>No. SPPKP</label>
          <input disabled type="text" class="form-control" name="no_sppkp" value="">
        </div>
        <div class="form-group">
          <label>Tanggal Terbit</label>
          <input disabled type="date" class="form-control" name="tanggal_terbit" value="">
        </div>
        <div class="form-group">
          <label>Upload SPPKP</label>
          <input disabled type="file" class="form-control" name="upload_sppkp" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="surat-izin-operasional" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Izin Operasional (SIO)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama SIO</label>
          <input disabled type="text" class="form-control" name="no_akta" value="">
        </div>
        <div class="form-group">
          <label>No. SIO</label>
          <input disabled type="text" class="form-control" name="no_akta" value="">
        </div>
        <div class="form-group">
          <label>Tanggal Terbit</label>
          <input disabled type="date" class="form-control" name="tanggal_terbit" value="">
        </div>
        <div class="form-group">
          <label>Tanggal Jatuh Tempo</label>
          <input disabled type="date" class="form-control" name="tanggal_jatuh_tempo" value="">
        </div>
        <div class="form-group">
          <label>Penerbit SIO</label>
          <input disabled type="text" class="form-control" name="penerbit_sk" value="">
        </div>
        <div class="form-group">
          <label>Upload SIO</label>
          <input disabled type="file" class="form-control" name="upload_sk" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection