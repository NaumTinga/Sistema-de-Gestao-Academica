<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Turma;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
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

        // return view('docentes.index',[
        //     'docentes' => DB::table('docentes')->paginate(5),
        //  ]);
        $docentes = Docente::all();

        $turmas = Turma::all();
        $disciplinas = Disciplina::all();
        //dd($docentes);
        return view('docentes.index')->with([
            'docentes' => $docentes,
            'turmas' => $turmas,
            'disciplinas' => $disciplinas,
        ]);
    }

    public function create()
    {
        $turmas = Turma::all();
        return view('Docentes.create')->with([
            'turmas' => $turmas,
        ]);
    }

    public function store()
    {

        $turmas = Turma::all()->find(request()->turmas);
        $docente = Docente::create(request()->all());
        //var_dump($docente);
        //var_dump($turmas);
        dd($docente);
        foreach ($turmas as $turma) {
            $turma->docente_id = $docente->id;
            $turma->save();
        }

        return redirect()->route('docentes.index')
            ->withSuccess("O Docente {$docente->nome} foi registado");
    }

    public function show($docente)
    {
        $turmas = Turma::all();
        $docente = Docente::findOrFail($docente);

        return view('docentes.show')->with([
            'docente' => $docente,
            'turmas' => $turmas,
        ]);
    }

    public function edit($docente)
    {

        return view('docentes.edit')->with([
            'docente' => Docente::findOrFail($docente),
        ]);
    }

    public function update($docente)
    {

        $docente = Docente::findOrFail($docente);
        $docente->update(request()->all());

        return redirect()->route('docentes.index');
    }

    public function destroy(Docente $docente)
    {

        // $docente = Docente::findOrFail($docente);
        $docente->delete();

        //return view('docentes.index');
        return redirect()
            ->route('docentes.index')
            ->withSuccess("O Docente  foi removido");
    }


    public function docenteTurma(){
        $docente = Docente::all();

        return view('Docentes.docenteTurma')->with([
            'docentes' => $docente,
        ]);
    }

    public function AssociarDocenteTurma($docente_id)
    {

        $docente = Docente::findOrFail($docente_id);
        $turmas = Turma::all()->find(request()->turmas);
        $docente->turmas()->attach($turmas);
        $docente->update(request()->all());
        //$docente->update(request()->where('turma_id'));
        return redirect()->back();
    }
}
