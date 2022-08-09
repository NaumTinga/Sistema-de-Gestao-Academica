<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',

    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }

    public function docentes()
    {
        return $this->belongsToMany(Docente::class);
    }

}
