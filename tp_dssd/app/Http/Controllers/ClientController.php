<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use App\Client;
use App\User;
use App\Role;
class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:user')->only('create','store');
        //$this->middleware('role:empleado')->only('show');
        //$this->middleware('role:cliente')->except('create','show','store');
    }

    public function create()
    {
      //return view('alta.incidencia')
      //return view("incidencia.create");
      $cli = new Client;
      return view('client.create', ['client' => $cli ]);
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
        'nom' => 'required|string|max:100',
        'ape' => 'required|string|max:50',
        'numCli' => 'required|integer|unique:clients',
      ], $messages);
      //$validator = Validator::make($request->all(), $rules);
      /*if ($validator->()) {
            return Redirect::to('client/create')
                ->withErrors($validator);
        } else {*/
        $user = Auth::user();
        $exist = Client::where('user_id', '=', $user->id)->first();
        if (!$exist == null){
          Session::flash('error', 'Su usuario ya posee datos de cliente.');
          return Redirect::to('client/create');
        }
        else{
          $role_client = Role::where('name', 'cliente')->first();
          $roleId = Role::where('id', 'user')->first();

          $cli = new Client;
          $cli->name = $request["nom"];
          $cli->lastname = $request["ape"];
          $cli->numCli = $request["numCli"];
          $usr = User::find($user->id);
          $usr->client()->save($cli);
          $user->roles()->detach($roleId);
          $usr->roles()->attach($role_client);
          //

          Session::flash('message', 'Se cargaron con exito los datos del cliente!');
          return Redirect::to('/home');
        }
      //}
    }
    public function show(Request $request)
    {
      //return "Filtrando empleados";
      $clients = Client::paginate(5);
      return view('client.list', ['clientes'=> $clients]);
    }

    public function edit()
    {
        $user = Auth::user();
        $cli = Client::find($user->client->id);

        return view('client.edit')->with('cli', $cli);
    }

    public function update(Request $request)
    {
      $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'string' => 'El campo :attribute debe ser de caracteres.',
        'max' => 'El campo :attribute no debe excede la cantidad máxima de caracteres.',
        'date' => 'El campo :attribute debe tener un formato de fecha válido (año-mes-día).',
        'integer' => 'El campo :attribute debe contener sólo números.',
        'unique' => 'El campo :attribute se encuentra duplicado, debe ser único.'
      ];
      $user = Auth::user();
      $cli = Client::find($user->client->id);

      $validator = $request->validate([
        'nom' => 'required|string|max:100',
        'ape' => 'required|string|max:50',
        'numCli' => 'required|integer|unique:clients,numCli,'.$cli->id,
      ], $messages);


      $cli->name = $request["nom"];
      $cli->lastname = $request["ape"];
      $cli->numCli = $request["numCli"];
      $cli->save();

        Session::flash('message', 'Se cargaron con exito los datos del cliente!');
        return Redirect::to('client/edit');
    }
}
