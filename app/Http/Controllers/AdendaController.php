<?php

namespace App\Http\Controllers;

use App\Models\Adenda;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Docente;
use App\Models\Turma;
use Illuminate\Http\Request;

class AdendaController extends Controller
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
        
        //$docentes = Docente::get('nome');
        $docentes = Docente::all();
        $cursos = Curso::all();
        $disciplinas = Disciplina::all();
        $turmas = Turma::all();
        $adendas = Adenda::all();

        return view('adendas.index')->with([
            'adendas' => $adendas,
            'docentes' => $docentes,
            'cursos' => $cursos,
            'disciplinas' => $disciplinas,
            'turmas' => $turmas,
        ]);
    }

    public function create()
    {
        $docentes = Docente::all();
        $cursos = Curso::all();
        $disciplinas = Disciplina::all();
        $turmas = Turma::all();

        return view('Adendas.create')->with([
            'docentes' => $docentes,
            'cursos' => $cursos,
            'disciplinas' => $disciplinas,
            'turmas' => $turmas,
        ]);
    }

    public function store()
    {


        //dd($request->all(),$curso,$disciplinas); //debug para ver se estamos a receber o curso

        $adenda = Adenda::create(request()->all());
        $docentes = Docente::find(request()->docentes);
        $adenda->docentes()->attach($docentes);
        $turmas = Turma::find(request()->turmas);
        $adenda->turmas()->attach($turmas);
        $disciplinas = Disciplina::find(request()->disciplinas);
        $adenda->disciplinas()->attach($disciplinas);
        $cursos = Curso::find(request()->cursos);
        $adenda->cursos()->attach($cursos);
        //dd(request()->all(), $adenda, $docentes);
        return redirect()->route('adendas.index')
            ->withSuccess("A Adenda {$adenda->nome} foi registado");
    }

    public function show($adenda)
    {

        $adenda = Adenda::findOrFail($adenda);

        return view('adendas.show')->with([
            'adenda' => $adenda,
        ]);
    }

    public function edit($adenda)
    {

        return view('adendas.edit')->with([
            'adenda' => Adenda::findOrFail($adenda),
        ]);
    }

    public function update($adenda)
    {

        $adenda = Adenda::findOrFail($adenda);
        $adenda->update(request()->all());

        return redirect()->route('adendas.index');
    }

    public function destroy(Adenda $adenda)
    {

        $adenda->delete();

        return redirect()
            ->route('adendas.index')
            ->withSuccess("A Adenda  foi removida");
    }
}
