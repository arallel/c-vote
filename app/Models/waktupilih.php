<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class waktupilih extends Model
{
    use HasFactory;
    protected $table = 'waktupilihs';
    protected $primaryKey = 'id_waktu';
    protected $fillable = [
        'tanggal_pemilu',
        'tanggal_selesai_pemilu'
    ];

    
}
