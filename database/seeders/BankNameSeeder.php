<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('bank_names')->insert([
            ['name' => 'Commercial'],
            ['name' => 'Boc'],
            ['name' => 'HNB'],
            ['name' => 'Sampath Bank'],
            ['name' => 'Pan Asia'],
        ]);
    }
}
