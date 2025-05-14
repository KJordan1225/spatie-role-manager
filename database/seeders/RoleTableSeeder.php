<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => RoleEnum::ADMIN, "guard_name" => "web"]);
		Role::create(['name' => RoleEnum::MANAGER, "guard_name" => "web"]);
        Role::create(['name' => RoleEnum::BROTHER, "guard_name" => "web"]);
    }
}
