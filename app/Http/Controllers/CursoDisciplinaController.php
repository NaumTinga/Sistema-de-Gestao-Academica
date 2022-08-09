<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Disciplina;

class CursoDisciplinaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function store(Request $request)
    {

        //$curso = Curso::create($request->curso);

        $curso = Curso::find($request->curso);
        $disciplinas = Disciplina::find($request->disciplinas);
        //dd($request->all(),$curso,$disciplinas); //debug para ver se estamos a receber o curso
        $curso->disciplinas()->attach($disciplinas);

        return redirect()->back();
    }
}
