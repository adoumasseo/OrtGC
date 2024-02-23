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
                'code' => '12345',
                'nom' => 'UAC',
            ],
            [
                'code' => '123456',
                'nom' => 'UP',
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
