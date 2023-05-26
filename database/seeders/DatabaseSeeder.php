<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StateSeeder::class,
            RoleSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Santiago Molano',
            'email' => 's.molano0818@gmail.com',
        ]);

        \App\Models\User::factory(9)->create();

        $this->call(UserRoleSeeder::class);

    }
}
