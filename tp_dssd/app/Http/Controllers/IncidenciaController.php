<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencia;
use App\Client;
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

    public function store(Request $request)
    {
      $validator = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'body' => 'required',
      ]);
      //$validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
            return Redirect::to('incidencia/create')
                ->withErrors($validator);
        } else {
            $cli = Client::find($numCli);
            $cli->incidencias()->save($inc);

            Session::flash('message', 'Reporte de incidencia cargado con exito!');
            return Redirect::to('incidencias');
      }
    }
}
