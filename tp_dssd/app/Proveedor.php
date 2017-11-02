<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function objetos()
    {
      return $this->belongsToMany('App\Objeto')->withPivot('stock', 'precio');
    }
}
