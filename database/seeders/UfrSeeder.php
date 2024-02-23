<?php

namespace Database\Seeders;

use App\Models\Ufr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UfrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ufrs = [
            [
                'code' => '12345',
                'nom' => 'FASEG',
                'universite_id' => 1,
            ],
            [
                'code' => '123456',
                'nom' => 'ENAM',
                'universite_id' => 1,
            ],
        ];
        foreach ($ufrs as $ufr) {
            Ufr::create([
                'code' => $ufr['code'],
                'nom' => $ufr['nom'],
                'universite_id' => $ufr['universite_id'],
            ]);
        }
    }
}
