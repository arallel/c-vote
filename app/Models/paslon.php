<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paslon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'paslon_id';
    protected $fillable = [
        'paslon_id',
        'foto_calon',
        'calon_ketua',
        'calon_wakil',
    ];
    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    
}
