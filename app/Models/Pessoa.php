<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
    'nome', 
    'dataNascimento', 
    'morada','naturalidade', 
    'genero', 
    'grauAcademico', 
    'nrTelefone', 
    'email'];
    
}
