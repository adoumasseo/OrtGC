<?php

namespace Database\Seeders;

use App\Models\Universite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universites = [
            [
                'code' => 'UAC',
                'nom' => "Université d'Abomey-Calavi",
            ],
            [
                'code' => 'UP',
                'nom' => 'Université de Parakou',
            ],

            [
                'code' => 'UNSTIM',
                'nom' => "Université Nationale des Sciences, de Techonologies et d'Ingéneurie Mathématique'",
            ],

            [
                'code' => 'UNA',
                'nom' => "Université Nationale d'Agriculture",
            ],
        ];
        foreach ($universites as $universite) {

            Universite::create([
                'code' => $universite['code'],
                'nom' => $universite['nom'],
            ]);
        }
    }
}
