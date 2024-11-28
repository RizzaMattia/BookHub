<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            ["name" => "Italo Calvino", "birthday" => "1923-10-15"],
            ["name" => "Dante Alighieri", "birthday" => "1265-01-01"],
            ["name" => "Umberto Eco", "birthday" => "1932-01-05"],
            ["name" => "Francesco Petrca", "birthday" => "1304-07-20"],
            ["name" => "Luigi Pirandello", "birthday" => "1867-06-28"],
            ["name" => "Allessandro Manzoni", "birthday" => "1785-03-07"]
        ]);
    }
}
