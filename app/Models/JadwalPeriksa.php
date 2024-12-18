<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaPasien',
        'noTelepon',
        'tanggalPeriksa',
        'tanggalPengingat',
        'jadwalPengingat',
        'jenisPengingat'
    ];
}
