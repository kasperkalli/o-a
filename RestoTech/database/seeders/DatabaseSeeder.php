<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Mesa;
use App\Models\Plato;
use App\Models\platoCategory;
use App\Models\RolType;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        RolType::create([
            'rol' => 'Customer'
        ]);
        RolType::create([
            'rol' => 'Admin'
        ]);
        User::create([
            'name' => 'test1',
            'email' => 'test1@mail.com',
            'password' => Hash::make('test123'),
            'rol_id' => 1
        ]);
        platoCategory::create(
            ['category' => 'entrada'],
            ['category' => 'plato fuerte'],
            ['category' => 'postre']);
        Mesa::create([
            'numero' => 1,
            'status' => 'disponible'
        ]);

    }
}
