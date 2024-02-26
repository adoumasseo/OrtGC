<?php

namespace Database\Seeders;

use App\Models\Ecue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EcueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* SEMESTRE 1 */

        $ecues = [
            [
                'code' => '1MTH1101',
                'nom' => "Algèbre linéaire",
            ],
            [
                'code' => '2MTH1101',
                'nom' => "Analyse mathématiques",
            ],

            [
                'code' => '1ECO1102',
                'nom' => "Économie générale",
            ],
            [
                'code' => '2ECO1102',
                'nom' => "Économie d'entreprise",
            ],


        ];
        foreach ($ecues as $ecue) {

            Ecue::create([
                'code' => $ecue['code'],
                'nom' => $ecue['nom'],
            ]);
        }
    }
}
