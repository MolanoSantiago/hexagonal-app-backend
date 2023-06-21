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
            'name' => 'Master',
            'email' => 'master@gmail.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Common',
            'email' => 'common@gmail.com',
        ]);

        $this->call(UserRoleSeeder::class);

    }
}
