<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemasukan',
        'kategori',
        'jumlah',
        'keterangan',
    ];
}
