<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSuntikKB extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaPasien',
        'noTelepon',
        'tanggalSuntik',
        'tanggalPengingat',
        'jadwalPengingat',
        'jenisPengingat'
    ];
}
