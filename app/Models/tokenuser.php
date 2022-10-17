<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tokenuser extends Model
{
    use HasFactory;
    protected $guard = 'siswa';
    protected $table = 'tokenusers';
    protected $primaryKey = 'id_token';
    protected $fillable = [
        'token_user',
    ];
}
