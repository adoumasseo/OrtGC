<?php

namespace Database\Seeders;

use App\Models\Ue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ues = [
            [
                'code' => 'MTH100',
                'nom' => "Mathématique générale",
            ],
            [
                'code' => 'INF101',
                'nom' => "Base de données",
            ],
        ];
        foreach ($ues as $ue) {

            Ue::create([
                'code' => $ue['code'],
                'nom' => $ue['nom'],
            ]);
        }
    }
}
