<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(CycleSeeder::class);
        $this->call(UniversiteSeeder::class);
        $this->call(UfrSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(FiliereSeeder::class);
        $this->call(ClasseSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UeSeeder::class);
        $this->call(EcueSeeder::class);
    }
}
