<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\RolType;
use App\Models\platoCategory;
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
        platoCategory::create([
            'category' => 'entrada'
        ]);
        platoCategory::create([
            'category' => 'plato fuerte'
        ]);
        platoCategory::create([
            'category' => 'postre'
        ]);
    }
}
