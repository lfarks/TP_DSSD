<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjetoController extends Controller
{
  public function index()
  {
      return Objeto::all();
  }

  public function store()
  {
      return Objeto::create(Input::all());
  }


  public function show($id)
  {
      return Objeto::findOrFail($id);
  }


  public function update($objId)
  {
      Objeto::findOrFail($objId)->update(Input::all());
  }


  public function delete($id)
  {
      Project::findOrFail($id)->delete();
  }
}
