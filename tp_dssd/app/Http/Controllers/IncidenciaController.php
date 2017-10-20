<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencia;
class IncidenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
      //return view('alta.incidencia')
      //return view("incidencia.create");
      $inc = new Incidencia;
      return view('incidencia.create', ['incidencia' => $inc ]);
    }

    public function store()
    {
      //
    }
}
