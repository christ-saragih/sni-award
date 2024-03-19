<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = array(
            array('nama' => 'open'),
            array('nama' => 'need repaid'),
            array('nama' => 'repaired'),
            array('nama' => 'rejected'),
            array('nama' => 'approved'),
        );

        DB::table('status')->insert($status);
    }
}
