<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;
    protected $fillable = [
        'nrTotalEstudantes',
        'designacao',
        'docente_id',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docente_id');
    }

    public function adendas()
    {
        return $this->belongsToMany(Adenda::class);
    }
}
