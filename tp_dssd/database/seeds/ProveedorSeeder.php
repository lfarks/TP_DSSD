<?php

use Illuminate\Database\Seeder;
use App\Proveedor;
class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $p = new Proveedor();
      $p->nombre = 'Proveedor 1';
      $p->save();

      $p1 = new Proveedor();
      $p1->nombre = 'Proveedor 2';
      $p1->save();
    }
}
