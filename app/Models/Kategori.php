<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'nama',
        'jenis',
        'keterangan',
        'pajak',
        'status'
    ];
}
