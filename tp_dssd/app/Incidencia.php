<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
  protected $rules = [
      'cliente' => ['required'],
      'fecha' => ['required|date'],
      'cantObj' => ['required|integer'],
      'desc' => ['required|string'],
      'motivo' => ['required|string']
  ];
}
