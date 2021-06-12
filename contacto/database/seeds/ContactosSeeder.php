<?php

use Illuminate\Database\Seeder;

class ContactosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contactos')->insert([
            [
                'nombre' => 'karen',
                'direccion' => 'Bogota',
                'telefono' => 301000000,
                'foto' => null,
            ],
            [
                'nombre' => 'vargas',
                'direccion' => 'Bogota',
                'telefono' => 2325123,
                'foto' => null,
            ],
            [
                'nombre' => 'juan',
                'direccion' => 'Bogota',
                'telefono' => 521322152,
                'foto' => null,
            ],
        ]);
    }
}
