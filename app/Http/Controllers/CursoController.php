<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Disciplina;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
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

    public function index()
    {


        $cursos = Curso::all();

        //  return view('cursos.index',[ 
        //     'cursos' => DB::table('cursos')->paginate(20),
        //  ]);
        return view('cursos.index')->with([
            'cursos' => $cursos,
        ]);
    }

    public function create()
    {

        return view('Cursos.create');
    }

    public function store()
    {
       //opcao 2 $curso = Curso::create(['name' => request()->name]);

        $curso = Curso::create(request()->all());
        $disciplinas = Disciplina::find(request()->disciplinas);
        $curso->disciplinas()->attach($disciplinas);

        return redirect()
            ->route('cursos.index')
            ->withSuccess("O Curso {$curso->nome} foi registado");
    }

    public function show($curso)
    {

        $disciplinas = Disciplina::all();

        $curso = Curso::findOrFail($curso);

        return view('cursos.show')->with([
            'curso' => $curso,
            'disciplinas' => $disciplinas,
        ]);
    }

    public function edit($curso)
    {

        return view('cursos.edit')->with([
            'curso' => Curso::findOrFail($curso),
        ]);
    }

    public function update($curso)
    {

        $curso = Curso::findOrFail($curso);
        $curso->update(request()->all());

        return redirect()->route('cursos.index');
    }

    public function destroy(Curso $curso)
    {

        $curso->delete();

        return redirect()
            ->route('cursos.index')
            ->withSuccess("O Curso  foi removido");
    }
}
