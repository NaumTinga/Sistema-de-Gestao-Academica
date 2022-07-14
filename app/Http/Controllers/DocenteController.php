<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
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
    
    public function index(){

        // return view('docentes.index',[ 
        //     'docentes' => DB::table('docentes')->paginate(5),
        //  ]);
        $docentes = Docente::all();

        return view('docentes.index')->with([
           'docentes' => $docentes,
        ]);

      
    }

    public function create(){

        return view('Docentes.create');
    }

    public function store(){
        
    
        $docente = Docente::create(request()->all());

        return redirect()->route('docentes.index')
                ->withSuccess("O Docente {$docente->nome} foi registado");
    }

    public function show($docente){
        $docente = Docente::findOrFail($docente);

        return view('docentes.show')->with([
            'docente' => $docente,
        ]);
    }
    
    public function edit($docente){
    
        return view('docentes.edit')->with([
            'docente' => Docente::findOrFail($docente),
        ]);
    }

    public function update($docente){

        $docente = Docente::findOrFail($docente);
        $docente->update(request()->all());

        return redirect()->route('docentes.index');
    }

    public function destroy(Docente $docente){

       // $docente = Docente::findOrFail($docente);
        $docente->delete();

        //return view('docentes.index');
        return redirect()
                ->route('docentes.index')
                ->withSuccess("O Docente  foi removido");
    }
}
