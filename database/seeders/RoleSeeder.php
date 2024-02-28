<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = array(
            array('id' => '1', 'nama' => 'admin'),
            array('id' => '2', 'nama' => 'evaluator'),
            array('id' => '3', 'nama' => 'lead evaluator'),
        );

        DB::table('role')->insert($role);
    }
}