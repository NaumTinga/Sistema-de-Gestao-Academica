<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        return 'lista de categoria';
    }

    public function create(){
        return 'grava categoria';
    }

    public function store(){
        return 'gravvaaaa categoria';
    }
    
    public function edit(){
        return 'edita categoria';
    }

    public function update(){
        return 'fazer update do categoria';
    }

    public function destroy(){
        return 'delete categoria';
    }
}
