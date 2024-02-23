<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'code' => 'AIP3',
                'nom' => "AIP3",
                'filiere_id' => 1,
                'cycle_id' => 1,
                'niveau' => 3,
            ],
        ];
        foreach ($classes as $classe) {

            Classe::create([
                'code' => $classe['code'],
                'nom' => $classe['nom'],
                'niveau' => $classe['niveau'],
                'filiere_id' => $classe['filiere_id'],
                'cycle_id' => $classe['cycle_id'],
            ]);
        }
    }
}
