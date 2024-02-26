<?php

namespace Database\Seeders;

use App\Models\Banque;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BanqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banques = [
            [
                'code' => 'BO44',
                'nom' => "BOA",
            ],
            [
                'code' => 'UB4',
                'nom' => "UBA",
            ],
            [
                'code' => 'Eco',
                'nom' => "EcoBank",
            ],
            [
                'code' => 'NS14',
                'nom' => "NSIA",
            ],
        ];
        foreach ($banques as $banque) {

            Banque::create([
                'code' => $banque['code'],
                'nom' => $banque['nom'],
            ]);
        }
    }
}
