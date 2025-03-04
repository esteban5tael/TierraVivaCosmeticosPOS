<?php

namespace Database\Seeders;

use App\Models\Compania;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Compania::create([
            'nombre' => 'Tierra Viva Cosmeticos',
            'correo' => 'tierravivacosmeticos@gmail.com',
            'telefono' => '3052850514',
            'direccion' => 'Colombia',
        ]);
    }
}
