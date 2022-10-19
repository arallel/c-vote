<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tokenuser extends Model
{
    use HasFactory;
    protected $table = 'token_siswa';
    protected $primaryKey = 'token_id';
    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'status',
        'token'

    ];
}
