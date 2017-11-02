<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{

  protected $fillable = [
      'cliente', 'fecha', 'cantObj', 'desc', 'motivo', 'estado'
  ];
  protected $rules = [
      'cliente' => ['required'],
      'fecha' => ['required|date'],
      'cantObj' => ['required|integer'],
      'desc' => ['required|string'],
      'motivo' => ['required|string'],
      'tipo' => ['required|string'],
      'estado' => ['string']
  ];

  public function client()
      {
          return $this->belongsTo('App\Client');
      }

}
