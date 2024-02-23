<?php

namespace Database\Seeders;

use App\Models\Filiere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filieres = [
            [
                'code' => 'AIP',
                'nom' => "Analyse Informatique et Programmation",
                'departement_id' => 1,
            ],
        ];
        foreach ($filieres as $filiere) {

            Filiere::create([
                'code' => $filiere['code'],
                'nom' => $filiere['nom'],
                'departement_id' => $filiere['departement_id'],
            ]);
        }
    }
}
