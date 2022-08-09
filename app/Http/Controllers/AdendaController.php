<?php

namespace App\Http\Controllers;

use App\Models\Adenda;
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
        $adendas = Adenda::all();

        return view('adendas.index')->with([
            'adendas' => $adendas,
        ]);
    }
}
