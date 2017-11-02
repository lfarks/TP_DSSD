<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
  protected $fillable = [
      'nombre', 'precio', 'codigo'
  ];

  public function proveedores()
  {
    return $this->belongsToMany('App\Proveedor');
  }
}
