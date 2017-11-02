<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
  protected $fillable = [
      'nombre', 'codigo'
  ];

  public function proveedores()
  {
    return $this->belongsToMany('App\Proveedor')->withPivot('stock', 'precio');
  }
}
