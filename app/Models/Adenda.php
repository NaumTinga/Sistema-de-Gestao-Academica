<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adenda extends Model
{
    protected $fillable = [
        'observacao', 
        'regime', 
        'turno', 
        'semestre', 
        'docente_Id', 
        'funcionario_Id', 
        'dataAlteracao'];

    // public function adenda(){
    //     return $this->belongsTo
    // }

    public function docentes()
    {
        return $this->belongsToMany(Docente::class);
    }
    public function turmas()
    {
        return $this->belongsToMany(Turma::class);
    }
    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class);
    }
    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }
}
