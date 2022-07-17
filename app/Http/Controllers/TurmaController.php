<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmaController extends Controller
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

        $turmas = turma::all();

        return view('turmas.index')->with([
            'turmas' => $turmas,
        ]);
    }

    public function create()
    {
        return view('turmas.create');
    }

    public function store()
    {

        $turma = turma::create(request()->all());

        return redirect()->route('turmas.index')
            ->withSuccess("A turma {$turma->designacao} foi registada");
    }

    public function show($turma)
    {

        $turma = turma::findOrFail($turma);

        return view('turmas.show')->with([
            'turma' => $turma,
        ]);
    }

    public function edit($turma)
    {

        return view('turmas.edit')->with([
            'turma' => turma::findOrFail($turma),
        ]);
    }

    public function update($turma)
    {

        $turma =  turma::findOrFail($turma);
        $turma->update(request()->all());

        return redirect()->route('turmas.index');
    }

    public function destroy(turma $turma)
    {
        $turma->delete();
        return redirect()
        ->route('turmas.index')
        ->withSuccess("A turma {$turma->designacao} foi removida");
    }
}
