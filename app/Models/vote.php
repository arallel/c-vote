<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    use HasFactory;
    protected $table = 'vote';
    protected $primaryKey = 'vote_id';
    protected $fillable = [
        'vote_count',
        'id_paslon',
    ];
    public function paslon()
    {
        return $this->belongsTo(paslon::class,'id_paslon');
    }
}
