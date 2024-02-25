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
        $ecues = [
            [
                'code' => '1MTH100',
                'nom' => "Algèbre",
            ],
            [
                'code' => '2MTH100',
                'nom' => "Analyse",
            ],
            [
                'code' => '1INF101',
                'nom' => "Théorie des bases de données",
            ],
            [
                'code' => '1INF101',
                'nom' => "SGBD",
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
