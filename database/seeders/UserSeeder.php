<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Divisi;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::pluck('id', 'name');     // ['Admin Surat' => 2, ...]
        $divisis = Divisi::pluck('id', 'nama_divisi'); // ['Sistem Informasi' => 1, ...]

        User::create([
            'name' => 'Admin Surat',
            'username' => 'adminsurat',
            'password' => Hash::make('password'),
            'role_id' => $roles['Admin Surat'],
            'divisi_id' => null,
        ]);

        User::create([
            'name' => 'Staff Sistem Informasi',
            'username' => 'staffsi',
            'password' => Hash::make('password'),
            'role_id' => $roles['Staff'],
            'divisi_id' => $divisis['Sistem Informasi'],
        ]);

        User::create([
            'name' => 'Kepala LLDIKTI',
            'username' => 'kepalalldikti',
            'password' => Hash::make('password'),
            'role_id' => $roles['Kepala LLDIKTI'],
            'divisi_id' => null,
        ]);

        // Tambah user lain jika perlu...
    }
}
