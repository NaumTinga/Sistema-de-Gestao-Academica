<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinaController extends Controller
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

        $disciplinas = Disciplina::all();

        return view('Disciplinas.index')->with([
            'disciplinas' => $disciplinas,
        ]);
    }

    public function create()
    {
        return view('Disciplinas.create');
    }

    public function store()
    {

        $disciplina = Disciplina::create(request()->all());

        return redirect()->route('disciplinas.index')
            ->withSuccess("A Disciplina {$disciplina->nome} foi registada");
    }

    public function show($disciplina)
    {

        $disciplina = Disciplina::findOrFail($disciplina);

        return view('disciplinas.show')->with([
            'disciplina' => $disciplina,
        ]);
    }

    public function edit($disciplina)
    {

        return view('disciplinas.edit')->with([
            'disciplina' => Disciplina::findOrFail($disciplina),
        ]);
    }

    public function update($disciplina)
    {

        $disciplina =  Disciplina::findOrFail($disciplina);
        $disciplina->update(request()->all());

        return redirect()->route('disciplinas.index');
    }

    public function destroy(Disciplina $disciplina)
    {
        $disciplina->delete();
        return redirect()
        ->route('disciplinas.index')
        ->withSuccess("A disciplina {$disciplina->nome} foi removida");
    }
}
