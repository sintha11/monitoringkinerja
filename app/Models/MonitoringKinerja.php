<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringKinerja extends Model
{
    use HasFactory;
    protected $table = "monitorings";
    protected $fillable =
     [
        'indikator_kinerja',
        'program_kegiatan',
        'target_kinerja',
        'realisasi_kinerja',
        'capaian_kinerja',
        'permasalahan',
        'tahun',
        'created_at',
    ];
}
