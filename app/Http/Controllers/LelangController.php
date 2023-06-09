<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\Pemenang;
use Illuminate\Http\Request;
use App\Models\JenisPengadaan;
use Illuminate\Support\Facades\Crypt;
use App\Models\AdditionalLampiranPengadaan;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class LelangController extends Controller
{
    public function index(){
        $lelangs = Lelang::where('status_pengadaan', 'lelang')->where('status_aktif', 'aktif')->latest()->paginate(10);
        return view('pages.lelang.index', compact('lelangs'));
    }

    public function create(){
        $jenis_pengadaans = JenisPengadaan::where('status_aktif', 'aktif')->get();
        return view('pages.lelang.create', compact('jenis_pengadaans'));
    }

    public function store(Request $request){
        $request->validate([
            'jenis_pengadaan_id' => 'required',
            'nama_lelang' => 'required',
            'uraian_singkat_pekerjaan' => 'required',
            'tanggal_mulai_lelang' => 'required|after:yesterday',
            'tanggal_akhir_lelang' => 'required|after:yesterday',
            'jenis_kontrak' => 'required',
            'lokasi_pekerjaan' => 'required',
            'hps' => 'required',
            'syarat_kualifikasi' => 'required',
            'lampiran_pengadaan' => 'required',
        ]);
        
        $id_generator = ['table' => 'lelangs', 'field' => 'kode_lelang', 'length' => 15, 'prefix' => 'pengadaan'];
        $kode_lelang = IdGenerator::generate($id_generator);

        $harga_perkiraan_sendiri = preg_replace('/\D/', '', $request->hps);
        $hps = trim($harga_perkiraan_sendiri);

        $array = array(
            'kode_lelang' => $kode_lelang,
            'jenis_pengadaan_id' => $request['jenis_pengadaan_id'],
            'nama_lelang' => $request['nama_lelang'],
            'uraian_singkat_pekerjaan' => $request['uraian_singkat_pekerjaan'],
            'tanggal_mulai_lelang' => $request['tanggal_mulai_lelang'],
            'tanggal_akhir_lelang' => $request['tanggal_akhir_lelang'],
            'jenis_kontrak' => $request['jenis_kontrak'],
            'lokasi_pekerjaan' => $request['lokasi_pekerjaan'],
            'hps' => $hps,
            'syarat_kualifikasi' => $request['syarat_kualifikasi'],
            'lampiran_pengadaan' => $request['lampiran_pengadaan'],
            'status_pengadaan' => 'lelang',
        );

        $lelang = Lelang::create($array);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.lelang.index')->with('success', 'Data has been created at '.$lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.lelang.index')->with('success', 'Data has been created at '.$lelang->created_at);
        }
    }

    public function show($id){
        $lelang = Lelang::find(Crypt::decrypt($id));
        $jenis_pengadaans = JenisPengadaan::where('status_aktif', 'aktif')->get();
        return view('pages.lelang.show', compact('lelang', 'jenis_pengadaans'));
    }

    public function edit($id){
        $lelang = Lelang::find(Crypt::decrypt($id));
        $jenis_pengadaans = JenisPengadaan::where('status_aktif', 'aktif')->get();
        return view('pages.lelang.edit', compact('lelang', 'jenis_pengadaans'));
    }

    public function update(Request $request, $id){
        $lelang = Lelang::find(Crypt::decrypt($id));

        $request->validate([
            'jenis_pengadaan_id' => 'required',
            'nama_lelang' => 'required',
            'uraian_singkat_pekerjaan' => 'required',
            'tanggal_mulai_lelang' => 'required',
            'tanggal_akhir_lelang' => 'required',
            'jenis_kontrak' => 'required',
            'lokasi_pekerjaan' => 'required',
            'hps' => 'required',
            'syarat_kualifikasi' => 'required',
            'lampiran_pengadaan' => 'required',
        ]);

        $harga_perkiraan_sendiri = preg_replace('/\D/', '', $request->hps);
        $hps = trim($harga_perkiraan_sendiri);
        
        $lelang->update([
            'jenis_pengadaan_id' => $request->jenis_pengadaan_id,
            'nama_lelang' => $request->nama_lelang,
            'uraian_singkat_pekerjaan' => $request->uraian_singkat_pekerjaan,
            'tanggal_mulai_lelang' => $request->tanggal_mulai_lelang,
            'tanggal_akhir_lelang' => $request->tanggal_akhir_lelang,
            'jenis_kontrak' => $request->jenis_kontrak,
            'lokasi_pekerjaan' => $request->lokasi_pekerjaan,
            'hps' => $hps,
            'syarat_kualifikasi' => $request->syarat_kualifikasi,
            'lampiran_pengadaan' => $request->lampiran_pengadaan,
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.lelang.index')->with('success', 'Data has been updated at '.$lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.lelang.index')->with('success', 'Data has been updated at '.$lelang->created_at);
        }
    }

    public function destroy($id){
        $lelang = Lelang::find(Crypt::decrypt($id));
        
        $lelang->update([
            'status_aktif' => 'tidak aktif',
        ]);

        $lelang->jadwal_lelangs()->update([
            'status_aktif' => 'tidak aktif',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('eproc.superadmin.lelang.index')->with('success', 'Data has been deleted at '.$lelang->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('eproc.admin.lelang.index')->with('success', 'Data has been deleted at '.$lelang->created_at);
        }
    }
}
