<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Clientes::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'calle'=> $faker->name,
        'numero'=> $faker->name,
        'interior'=> $faker->name,
        'colonia'=> $faker->name,
        'ciudad'=> $faker->name,
        'cp'=> $faker->name,
        'estado'=> $faker->name,
        'contacto1'=> $faker->name,
        'tel1'=> $faker->name,
        'mail1'=> $faker->name,
        'contacto2'=> $faker->name,
        'tel2'=> $faker->name,
        'mail2'=> $faker->name,
        'dia_revision'=> $faker->name,
        'dia_credito'=> $faker->numberBetween(1,30),
    ];
});

$factory->define(\App\Provedores::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'razon_social'=> $faker->name,
        'rfc'=> $faker->name,
        'direccion'=> $faker->name,
        'contacto'=> $faker->name,
        'mail'=> $faker->name,
        'credito'=> $faker->numberBetween(1000, 10000),
        'saldo'=> $faker->numberBetween(1425.125, 123543.1234),
    ];
});

$factory->define(\App\Operadores::class, function (Faker $faker) {
    return [
        'apellido_paterno' => $faker->name,
        'apellido_materno'=> $faker->name,
        'nombres'=> $faker->name,
        'nombre_corto'=> $faker->name,
        'licencia'=> $faker->name,
        'vigencia_licencia'=> $faker->date(),
        'vigencia_medico'=> $faker->date(),
        'obs'=> $faker->name,
    ];
});

$factory->define(\App\Rutas::class, function (Faker $faker) {
    return [
        'clientes' => $faker->numberBetween(1,10),
        'nombre' => $faker->name,
        'lugar_exp' => $faker->name,
        'origen' => $faker->name,
        'remitente' => $faker->name,
        'dom_remitente' => $faker->name,
        'recoge' => $faker->name,
        'valor_declarado' => $faker->name,
        'destino' => $faker->name,
        'destinatario' => $faker->name,
        'dom_destinatario' => $faker->name,
        'entrega' => $faker->name,
        'fecha_entrega' => $faker->name,
        'cantidad' => $faker->name,
        'embalaje' => $faker->name,
        'concepto' => $faker->name,
        'material_peligroso' => $faker->name,
        'indemnizacion' => $faker->name,
        'importe' => $faker->numberBetween(1,10),
        'asignacion_precio' => $faker->numberBetween(1,10),
        'obs' => $faker->name,
        'dias_re' => $faker->numberBetween(1,5),
    ];
});

$factory->define(\App\Unidades::class, function (Faker $faker) {
    return [
        'provedor' => $faker->numberBetween(1,10),
        'nombre' => $faker->name,
        'economico' => $faker->name,
        'tipo' => $faker->numberBetween(1,2),
        'marca' => $faker->name,
        'modelo' => $faker->name,
        'placas' => $faker->name,
        'serie' => $faker->name,
        'motor' => $faker->name,
        'seguro' => $faker->date(),
        'verificacion' => $faker->date(),
        'fm' => $faker->date(),
        'obs' => $faker->name
    ];
});

$factory->define(\App\DatosFacturacion::class, function (Faker $faker) {
    return [
        'rutas' => $faker->numberBetween(1,10),
        'facturador' => $faker->numberBetween(1,10),
        'asignacionPrecio' => $faker->numberBetween(1,50),
        'claveProdServ' => $faker->name,
        'noIdentificacion' => $faker->name,
        'cantidad' => $faker->numberBetween(1000,1500),
        'claveUnidad' => $faker->name,
        'unidad' => $faker->name,
        'descripcion' => $faker->name,
        'valorUnitario' => $faker->numberBetween(1000,1500),
        'importe' => $faker->numberBetween(100,1800),
        'tIva' => $faker->numberBetween(100,150),
        'tIsr' => $faker->numberBetween(100,150),
        'rIva' => $faker->numberBetween(100,150),
        'rIsr' => $faker->numberBetween(100,150)
    ];
});

$factory->define(\App\Usuarios::class, function (Faker $faker) {
    return [
        'apellidoPaterno' => $faker->name,
        'apellidoMaterno' => $faker->name,
        'nombre' => $faker->name,
        'password' => $faker->name,
        'nombreCorto' => $faker->name,
        'cargo' => $faker->name,
        'area' => $faker->name,
        'modulo01' => $faker->boolean,
        'modulo02' => $faker->boolean,
        'modulo03' => $faker->boolean,
        'modulo04' => $faker->boolean,
        'modulo05' => $faker->boolean,
        'modulo06' => $faker->boolean,
        'modulo07' => $faker->boolean,
        'modulo08' => $faker->boolean,
        'modulo09' => $faker->boolean,
        'modulo10' => $faker->boolean
    ];
});

$factory->define(\App\DatosCporPagar::class, function (Faker $faker) {
    return [
        'ruta' => $faker->numberBetween(1,30),
        'concepto' => $faker->name,
        'asignacionPrecio' => $faker->numberBetween(1,30),
        'claveProdServ' => $faker->name,
        'noIdentificacion' => $faker->name,
        'cantidad' => $faker->numberBetween(100,150),
        'claveUnidad' => $faker->name,
        'unidad' => $faker->name,
        'descripcion' => $faker->name,
        'valorUnitario' => $faker->numberBetween(100,150),
        'importe' => $faker->numberBetween(100,150),
        'tivaCxP' => $faker->numberBetween(100,150),
        'tisrCxP' => $faker->numberBetween(100,150),
        'rivaCxP' => $faker->numberBetween(100,150),
        'risrCxP' => $faker->numberBetween(100,150),
    ];
});