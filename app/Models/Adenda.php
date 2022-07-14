<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adenda extends Model
{
    protected $fillable = [
        'obervacao', 
        'regime', 
        'turno', 
        'semestre', 
        'docente_Id', 
        'funcionario_Id', 
        'dataAlteracao'];

    // public function adenda(){
    //     return $this->belongsTo
    // }
}
