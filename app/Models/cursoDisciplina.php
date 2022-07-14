<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursoDisciplina extends Model
{
    protected $fillable = [
        'curso_Id', 
        'disciplina_Id',
    ];
}
