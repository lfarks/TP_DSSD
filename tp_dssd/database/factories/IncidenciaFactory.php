<?php

use Faker\Generator as Faker;
use Carbon\Carbon as Carbon;
$factory->define(App\Incidencia::class, function (Faker $faker) {
    return [
        'motivo' => "asdass asd asd asfasf;fas sa jdjashjdhasd. Esjjsjdsjd jsjdsjkajd",
        'fecha' => Carbon::now(),
        'cantObjetos' => random_int(1,100),
        'client_id' => random_int(1,10),
        'tipo' => 'CASA',
        'numExpediente' => random_int(1,1000000000),
        'estado' => 'Aprobado',
        'descripcion' => "sadsasd sakdjksdj sajdhshjsds............................................."
    ];
});
