<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use App\Incidencia;
use App\Client;
use App\User;

use Illuminate\Support\Facades\Storage;

class IncidenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:user')->only('create');
        $this->middleware('role:empleado')->only('listAll','createFoto','upload');//except('show','create','store');
        $this->middleware('role:cliente')->except('listAll','createFoto','upload');
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
      $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'string' => 'El campo :attribute debe ser de caracteres.',
        'max' => 'El campo :attribute no debe excede la cantidad máxima de caracteres.',
        'date' => 'El campo :attribute debe tener un formato de fecha válido (año-mes-día).',
        'integer' => 'El campo :attribute debe contener sólo números.',
        'unique' => 'El campo :attribute se encuentra duplicado, debe ser único.'
      ];
      $validator = $request->validate([
        'tipo' => 'required|string|max:255',
        'fecha' => 'required|date',
        'cantObj' => 'required|integer',
        'desc' => 'required|string',
        'motivo' => 'required|string',
      ], $messages);
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
        //$inc->numExpediente = -1;//random_int(1,1000000000);

        //$exist->incidencias()->save($inc);
        $user->client->incidencias()->save($inc);
        //$cli->incidencias()->save($inc);

        Session::flash('message', 'Reporte de incidencia cargado con exito!');
        return Redirect::to('incidencias');
      }
    }

    public function show()
    {
      $user = Auth::user();

      //$incidencias = Incidencia::where('client_id', $user->client->numCli);
      //$incidencias = Incidencias::where('user_id', '=', $user->id)->first();
      //Storage::disk('dropbox')->put('file.txt', 'Test subiendo archivos a dropbox ');
      $incidencias = $user->client->incidencias;
      return view('incidencia.list', ['incidencias'=> $incidencias, 'num_cli'=>$user->client->numCli]);
      //return View::make('incidencia.list')->with('incidencias', $incidencias);
    }

    public function showOne($id)
    {
      $user = Auth::user();
      $inc = Incidencia::find($id);

      return view('incidencia.show', ['inc'=> $inc, 'num_cli'=>$user->client->numCli]);
      //return View::make('incidencia.list')->with('incidencias', $incidencias);
    }

    public function edit($id)
    {
        $inc = Incidencia::find($id);
        return view('incidencia.edit')->with('inc', $inc);
    }

    public function update($id, Request $request)
    {
      $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'string' => 'El campo :attribute debe ser de caracteres.',
        'max' => 'El campo :attribute no debe excede la cantidad máxima de caracteres.',
        'date' => 'El campo :attribute debe tener un formato de fecha válido (año-mes-día).',
        'integer' => 'El campo :attribute debe contener sólo números.',
        'unique' => 'El campo :attribute se encuentra duplicado, debe ser único.'
      ];
      $validator = $request->validate([
        'tipo' => 'required|string|max:255',
        'fecha' => 'required|date',
        'cantObj' => 'required|integer',
        'desc' => 'required|string',
        'motivo' => 'required|string',
      ], $messages);

      $inc = Incidencia::find($id);
      $inc->tipo = $request["tipo"];
      $inc->fecha = $request["fecha"];
      $inc->cantObjetos = $request["cantObj"];
      $inc->descripcion = $request["desc"];
      $inc->motivo = $request["motivo"];

      $inc->save();

      Session::flash('message', 'Reporte de incidencia actualizado con exito!');
      return Redirect::to('incidencias');
    }

    public function listAll()
    {
      //$incidencias = Incidencia::All();
      $incidencias = Incidencia::select('*')//fecha, cantObjetos, descripcion, motivo, tipo, numExpediente, clients.numCli')
        ->join('clients', 'clients.id', '=', 'incidencias.client_id')->get();
      return view('incidencia.listAll', ['incidencias'=> $incidencias]);
    }

    public function createFoto($numExp)
    {
      return view('incidencia.uploadFotos', ['numExp' => $numExp]);
    }

    public function upload($numExp, Request $request)
    {
      $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'image' => 'Seleccione un archivo de imagen.',
        'mimes' => 'Seleccione un formato de imagen válido (png, jpg, jpeg)'
      ];
      $validator = $request->validate([
        'fotos' => 'required',
        'fotos.*' => 'required|mimes:png,jpg,jpeg|image'
      ], $messages);
      //Session::flash('warning', 'Espere mientras se cargan las fotos. Esto puede demorar un rato.');
      //if(!empty($files))
      foreach($request->file('fotos') as $file)
      {
          $path = $file->store($numExp.'/', 'dropbox');
      }
      // //return "Foto cargada en ".$path;
      Session::flash('message', 'Se cargaron las fotos con exito!');
      return view('incidencia.uploadFotos', ['numExp' => $numExp]);
      }
}
