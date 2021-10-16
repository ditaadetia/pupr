<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albert extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'foto',
        'jenis',
        'kegunaan',
        'harga_sewa_perjam',
        'harga_sewa_perhari',
        'keterangan',
        'kondisi'
    ];
}