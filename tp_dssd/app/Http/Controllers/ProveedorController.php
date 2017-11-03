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
    $proveedor = Proveedor::select('proveedors.nombre','stock', 'precio', 'objetos.codigo')
                                ->join('objeto_proveedor', 'proveedors.id', '=', 'objeto_proveedor.proveedor_id')
                                ->join('objetos', 'objetos.id', '=', 'objeto_proveedor.objeto_id')
                                ->where([['objetos.codigo', '=', $codObj], ['proveedors.id', '=', 1], ['objeto_proveedor.stock', '>=', $cant]]);
    return $proveedor->get();
  }

  public function presupuesto2($codObj)
  {
    $proveedor = Proveedor::select('proveedors.nombre','stock', 'precio', 'objetos.codigo')
                                ->join('objeto_proveedor', 'proveedors.id', '=', 'objeto_proveedor.proveedor_id')
                                ->join('objetos', 'objetos.id', '=', 'objeto_proveedor.objeto_id')
                                ->where([['objetos.codigo', '=', $codObj], ['proveedors.id', '=', 2]]);
    return $proveedor->get();
  }
}
