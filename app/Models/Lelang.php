<?php

namespace App\Models;

use App\Models\JadwalLelang;
use App\Models\LampiranPengadaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdditionalLampiranPengadaan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lelang extends Model
{
    use HasFactory;

    protected $table = 'lelangs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kode_lelang',
        'nama_lelang',
        'hps',
        'tanggal_mulai_lelang',
        'tanggal_akhir_lelang',
        'status_aktif',
        'created_by',
        'updated_by',
    ];

    protected static function booted(){
        static::creating(function($model){
            $model->created_by = Auth::user()->email;
            $model->updated_by = Auth::user()->email;
        });

        static::saving(function($model){
            $model->updated_by = Auth::user()->email;
        });
    }

    public function jadwal_lelangs(){
        return $this->hasMany(JadwalLelang::class);
    }

    public function lampiran_pengadaans(){
        return $this->hasMany(LampiranPengadaan::class);
    }

    public function additional_lampiran_pengadaans(){
        return $this->hasMany(AdditionalLampiranPengadaan::class);
    }
}
