<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputData extends Model
{
    use HasFactory;

    protected $table = 'input_data';

    protected $fillable = [
        'bidang',
        'kategori',
        'tahun',
        'nama_perusahaan',
        'no_rekening',
        'nilai_kontrak',
        'nilai_spp',
        'uraian_kegiatan',
    ];

    // Custom format jika diperlukan
    protected $casts = [
        'tahun' => 'integer',
        'nilai_kontrak' => 'decimal:2',
        'nilai_spp' => 'decimal:2',
    ];
}
