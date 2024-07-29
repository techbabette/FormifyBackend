<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseUsers = [
            [
                'first_name' => 'First',
                'last_name' => 'Last',
                'email' => 'ilija.krstic.155.21@ict.edu.rs',
                'password' => 'password',
                'email_verified_at' => now(),
                'group_id' => 2
            ]
        ];

        foreach ($baseUsers as $user){
            User::create($user);
        }
    }
}
