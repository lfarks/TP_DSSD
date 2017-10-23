<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $fillable = [
      'name', 'lastname', 'numCli',
  ];

  protected $rules = [
      'nombre' => ['required'],
      'apellido' => ['required'],
      'numCli' => ['required|integer|unique']
      //...
  ];

  public function user()
  {
      return $this->hasOne('App\User');
  }

  public function incidencias()
  {
      return $this->hasMany('App\Incidencia');
  }
}
