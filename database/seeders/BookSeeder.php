<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            ["title" => "Le città invisibili", "description" => "Un viaggio immaginario attraverso città fantastiche, ognuna simbolo di un aspetto della vita umana.", "pages" => 165, "author_id" => 1, "category_id" => 1],
            ["title" => "Divina Commedia", "description" => "Un poema epico che descrive il viaggio di Dante attraverso Inferno, Purgatorio e Paradiso.", "pages" => 1000, "author_id" => 2, "category_id" => 2],
            ["title" => "Il nome della rosa", "description" => "Un giallo medievale che esplora il mistero di omicidi in un monastero, con riferimenti filosofici e storici.", "pages" => 500, "author_id" => 3, "category_id" => 3],
            ["title" => "Canzoniere", "description" => "Una raccolta di poesie che esprimono l'amore e il desiderio di una donna, Laura, simbolo dell'amore ideale.", "pages" => 400, "author_id" => 4, "category_id" => 4],
            ["title" => "Sei personaggi in cerca d'autore", "description" => "Una commedia che esplora il confine tra realtà e finzione, con sei personaggi che interrompono una prova teatrale.", "pages" => 120, "author_id" => 5, "category_id" => 5],
            ["title" => "I promessi sposi", "description" => "Un romanzo storico che racconta le vicende di due giovani innamorati nel contesto della Lombardia del Seicento.", "pages" => 700, "author_id" => 6, "category_id" => 6]
        ]);
    }
}
