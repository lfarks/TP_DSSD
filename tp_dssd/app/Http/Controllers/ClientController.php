<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use App\Client;
use App\User;
class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
      $validator = $request->validate([
        'nom' => 'required|string|max:100',
        'ape' => 'required|string|max:50',
        'numCli' => 'required|integer|unique:clients',
      ]);
      //$validator = Validator::make($request->all(), $rules);
      /*if ($validator->()) {
            return Redirect::to('client/create')
                ->withErrors($validator);
        } else {*/
        $user = Auth::user();
        if (Client::where('user_id', '=', $user->id)){
          Session::flash('error', 'Su usuario ya posee datos de cliente.');
          return Redirect::to('client/create');
        }
        else{
          $cli = new Client;
          $cli->name = $request["nom"];
          $cli->lastname = $request["ape"];
          $cli->numCli = $request["numCli"];
          //$cli::create($request->all());
          //$usr = User::find($usr_id);
          //...
          //$cli->user()->save($user);
          $usr = User::find($user->id);
          $usr->client()->save($cli);
          //$cli->save();
          //

          Session::flash('message', 'Se cargaron con exito los datos del cliente!');
          return Redirect::to('client/create');
        }
      //}
    }
}
