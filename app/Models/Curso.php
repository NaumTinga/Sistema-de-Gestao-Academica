<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome'
    ];

    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class);
    }

    public function adendas()
    {
        return $this->belongsToMany(Adenda::class);
    }
}
