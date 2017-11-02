<?php

use Illuminate\Database\Seeder;

class ObjetoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Objeto::class, 50)->create()
                ->each(function($o) {
                          $o->proveedores()->attach(App\Proveedor::where('nombre', 'Proveedor 1')->first(),
                            ['stock'=>random_int(1,100), 'precio'=>random_int(1,1000)]);
                          $o->proveedores()->attach(App\Proveedor::where('nombre', 'Proveedor 2')->first(),
                            ['stock'=>random_int(1,100), 'precio'=>random_int(1,1000)]);
                        });
    }
}
