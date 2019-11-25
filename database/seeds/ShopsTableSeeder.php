<?php

use Illuminate\Database\Seeder;

use App\Shop;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
            'comercio'      => 'comercio de prueba',
            'cliente'       => 'Juan Crespo',
            'correo'        => 'jc@mail.com',
            'telefono'      => '+582931234567',
            'pais'          => 'Venezuela',
            'estado'        => 'Sucre',
            'ciudad'        => 'Cumana',
            'direccion'     => 'Calle cocollar',
            'social'        => 'jc@mail.com'
        ]);

        Shop::create([
            'comercio'      => 'comercio de ejemplo',
            'cliente'       => 'Diana Guzman',
            'correo'        => 'dg@mail.com',
            'telefono'      => '+582937654321',
            'pais'          => 'Venezuela',
            'estado'        => 'Monagas',
            'ciudad'        => 'Maturin',
            'direccion'     => 'Calle Aristides',
            'social'        => 'dg@mail.com'
        ]);
    }
}
