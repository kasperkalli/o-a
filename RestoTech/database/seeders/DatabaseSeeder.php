<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Mesa;
use App\Models\Platos;
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
        
        tipo_rol::create(['rol' => 'Customer']);
        tipo_rol::create(['rol' => 'Admin']);

        User::create(
            ['name' => 'admin1',
            'email' => 'admin@mail.com',
            'rol_id' => 2,
            'password' => Hash::make('admin123'),]);
        User::create(            
            ['name' => 'user1',
            'email' => 'user@mail.com',
            'rol_id' => 1,
            'password' => Hash::make('user123')]);

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
