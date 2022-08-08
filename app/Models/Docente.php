<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
   use HasFactory;

   protected $fillable = [
      'nome',
      'dataNascimento',
      'morada',
      'naturalidade',
      'genero',
      'grauAcademico',
      'escalao',
      'nivel',
      'nrTelefone',
      'email',
      'disciplina_Id',
      'curso_Id',
      'bloco_Id',
      'turma_Id',
      'areaCientifica',
      'categoria_Id'
   ];

   public function turmas()
    {
        return $this->hasMany(Turma::class);
    }

}
