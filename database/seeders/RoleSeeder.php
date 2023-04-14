<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['superadmin','customer'];
        foreach ($roles as $item) {
        $role = Role::updateOrCreate([
        'name' => $item
        ],[]);
        }

    }
}
