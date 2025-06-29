<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        
        $nonDivisionalUsers = [
            ['name' => 'Dimas Prakoso', 'username' => 'adminsurat01', 'password' => 'password'],
        ];

        foreach ($nonDivisionalUsers as $user) {
            User::updateOrCreate(
                ['username' => $user['username']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make($user['password']),
                ]
            );
        }
    }
}
