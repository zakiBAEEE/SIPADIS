<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'Kepala LLDIKTI',
            'KBU',
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['name' => $role], // Cek jika sudah ada
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
