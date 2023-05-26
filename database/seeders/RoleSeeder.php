<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{

    private array $roles = ['master', 'common'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->roles as $rol) {
            DB::table('roles')->insert([
                'name' => $rol,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
