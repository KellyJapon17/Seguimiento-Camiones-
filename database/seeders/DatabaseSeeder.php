<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create()

        User::factory()->create([
            'name' => 'Usuario administrador',
            'email' => 'admin@example.com',
            'role'=>1,
            'password'=>Hash::make('12345')
        ]);

        User::factory()->create([
            'name' => 'Usuario conductor',
            'email' => 'conductor1@example.com',
            'role'=>2,
            'password'=>Hash::make('12345')
        ]);

        User::factory()->create([
            'name' => 'Usuario normal',
            'email' => 'normal1@example.com',
            'role'=>3,
            'password'=>Hash::make('12345')
        ]);
    }
}
