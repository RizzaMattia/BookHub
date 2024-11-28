<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ["name" => "Narrativo"],
            ["name" => "Poema Epico"],
            ["name" => "Giallo"],
            ["name" => "Poesia"],
            ["name" => "Dramma"],
            ["name" => "Romanzo"]
        ]);
    }
}
