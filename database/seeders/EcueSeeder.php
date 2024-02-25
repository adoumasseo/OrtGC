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
                'ue_id' => 1,
            ],
            [
                'code' => '2MTH100',
                'nom' => "Analyse",
                'ue_id' => 1,
            ],
            [
                'code' => '1INF101',
                'nom' => "Théorie des bases de données",
                'ue_id' => 2,
            ],
            [
                'code' => '1INF101',
                'nom' => "SGBD",
                'ue_id' => 2,
            ],
        ];
        foreach ($ecues as $ecue) {

            Ecue::create([
                'code' => $ecue['code'],
                'nom' => $ecue['nom'],
                'ue_id' => $ecue['ue_id'],
            ]);
        }
    }
}
