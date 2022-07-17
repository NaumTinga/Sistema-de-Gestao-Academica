<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'grauAcademico', 
        'escalao', 
        'nivel',
    ];

    // public function categoria(){
    //     return $this->belongsTo(docente::class);
    // }
}
