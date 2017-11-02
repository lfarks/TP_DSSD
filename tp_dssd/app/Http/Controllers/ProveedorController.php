<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Objeto;
class ProveedorController extends Controller
{
  public function index()
  {
      return Proveedor::all();
  }
  public function presupuesto($codObj, $cant)//$idProv, $codObj, $cant)
  {
    //$proveedores = Proveedor::all();
    //$proveedor = Proveedor::findOrFail($idProv)->objetos;
    //$objetos = Objeto::where('codigo', $codObj);
    //dd($objetos);
    //foreach ($objetos as $obj) {
    //  echo $obj->pivot->precio;
    //}
    //$proveedor = Proveedor::findOrFail($idProv)::where("objetos.codigo", "=", $codObj);
    $proveedor = Proveedor::select('proveedors.nombre','stock', 'precio', 'objetos.codigo')
                                ->join('objeto_proveedor', 'proveedors.id', '=', 'objeto_proveedor.proveedor_id')
                                ->join('objetos', 'objetos.id', '=', 'objeto_proveedor.objeto_id')
                                ->where([['objetos.codigo', '=', $codObj], ['objeto_proveedor.stock', '>=', $cant]]);
    //$obj = Objeto::findOrFail($codObj);
    //$res = $proveedor->pivot;
    //dd($proveedor);
    //return json_encode($objetos);//->toJson();
    /*foreach ($proveedor->objetos as $obj) {
      if ($obj->codigo == $codObj && $obj->pivot->stock >= $cant)
      {
        //return $res;
        echo $obj->pivot->precio;
        echo " code: ";
        echo $obj->codigo;
        echo "<br>";
      }
    }*/
    //dd($obj->pivot);
    return $proveedor->get();
  }

  /*public function store()
  {
      return Proveedor::create(Input::all());
  }


  public function show($id)
  {
      return Proveedor::findOrFail($id);
  }


  public function update($provId)
  {
      Proveedor::findOrFail($provId)->update(Input::all());
  }


  public function delete($id)
  {
      Proveedor::findOrFail($id)->delete();
  }*/
}
