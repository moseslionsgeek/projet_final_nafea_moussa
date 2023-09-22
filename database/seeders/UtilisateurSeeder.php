<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create( [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '88888888', // password
        ])->assignRole('admin');

        User::create( [
            'name' => 'moussa',
            'email' => 'moussa@gmail.com',
            'email_verified_at' => now(),
            'password' => '88888888', // password
        ])->assignRole('user');

        User::create( [
            'name' => 'webmaster',
            'email' => 'webmaster@gmail.com',
            'email_verified_at' => now(),
            'password' => '88888888', // password
        ])->assignRole('webmaster');
    }
}
