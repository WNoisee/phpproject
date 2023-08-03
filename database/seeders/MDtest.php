<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MDtest extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('_m_dtest')->insert(['name'=>'Pyllan', 'password'=>bcrypt('123456'), 'role'=>'1']);
        DB::table('_m_dtest')->insert(['name'=>'Phong', 'password'=>bcrypt('123456'), 'role'=>'0']);
    }
}
