<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Mesa;
use App\Models\Plato;
use App\Models\categorias_plato;
use App\Models\tipo_rol;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        tipo_rol::create(
            ['rol' => 'Customer'],
            ['rol' => 'Admin']
        );

        User::create(
            ['name' => 'admin1',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'rol_id' => 2],
            ['name' => 'user1',
            'email' => 'user@mail.com',
            'password' => Hash::make('user123'),
            'rol_id' => 1]
        );

        categorias_plato::create(
            ['categoria' => 'entrada'],
            ['categoria' => 'plato fuerte'],
            ['categoria' => 'postre']
        );

        Mesa::create(
            ['descripcion' => 'mesa de test',
             'posx' => 0,
             'posy' => 0]
        );

    }
}
