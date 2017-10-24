<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use App\Incidencia;
use App\Client;
use App\User;
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
        'tipo' => 'required|string|max:255',
        'fecha' => 'required|date',
        'cantObj' => 'required|integer',
        'desc' => 'required|string',
        'motivo' => 'required|string',
      ]);
      $user = Auth::user();
      //print($user->client->numCli);
      $exist = Client::where('user_id', '=', $user->id)->first();
      if ($exist == null){
      //if ($user->client->numCli == null){
        Session::flash('error', 'Primero debe completar sus datos de cliente para que se le asigne un numero de cliente.');
        return Redirect::to('incidencia/create');
      }
      else{
        $inc = new Incidencia;
        $inc->tipo = $request["tipo"];
        $inc->fecha = $request["fecha"];
        $inc->cantObjetos = $request["cantObj"];
        $inc->descripcion = $request["desc"];
        $inc->motivo = $request["motivo"];
        $inc->numExpediente = random_int(1,1000000000);

        //$exist->incidencias()->save($inc);
        $user->client->incidencias()->save($inc);
        //$cli->incidencias()->save($inc);

        Session::flash('message', 'Reporte de incidencia cargado con exito!');
        return Redirect::to('incidencia/create');
      }
    }

    public function show()
    {
      $user = Auth::user();

      //$incidencias = Incidencia::where('client_id', $user->client->numCli);
      $incidencias = $user->client->incidencias;
      return view('incidencia.list', ['incidencias'=> $incidencias, 'num_cli'=>$user->client->numCli]);
      //return View::make('incidencia.list')->with('incidencias', $incidencias);
    }
}
