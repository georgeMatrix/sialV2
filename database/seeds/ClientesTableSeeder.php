<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Clientes::class, 50)->create();
        factory(\App\Provedores::class, 50)->create();
        factory(\App\Operadores::class, 50)->create();
        factory(\App\Rutas::class, 50)->create();
        factory(\App\Unidades::class, 50)->create();
        factory(\App\DatosFacturacion::class, 50)->create();
        factory(\App\Usuarios::class, 50)->create();
        factory(\App\DatosCporPagar::class, 50)->create();
    }
}
