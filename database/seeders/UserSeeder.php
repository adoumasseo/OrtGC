<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create(['nom' => 'COMLAN',
        'prenom' => 'Maurice',
        'email' => 'maurice.comlan@uac.bj',
        'password' => Hash::make('admin'),
        'email_verified_at'=>'2022-01-02 17:04:58',
        'avatar' => 'avatar-1.jpg','created_at' => now(),]);

        $admin->assignRole('Administrateur');
    }
}
