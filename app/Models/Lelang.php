<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
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
}