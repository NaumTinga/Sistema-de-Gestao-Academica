<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloco extends Model
{
    protected $fillable = ['designacao'];

    // public function bloco(){
    //     return $this->belongsTo(docente::class);
    // }
}
