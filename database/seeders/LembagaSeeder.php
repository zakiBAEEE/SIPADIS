<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LembagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lembaga')->insert([
            'nama_kementerian' => 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi',
            'nama_lembaga' => 'LLDIKTI Wilayah II',
            'email' => 'info@lldikti2.id',
            'alamat' => 'Jl. Srijaya Negara Bukit Besar, Palembang, Sumatera Selatan',
            'telepon' => '(0711) 5641450',
            'website' => 'https://lldikti2.kemdikbud.go.id',
            'kota' => 'Palembang',
            'provinsi' => 'Sumatera Selatan',
            'kepala_kantor' => 'Ishak Iskandar',
            'nip_kepala_kantor' => '196303031990031002', // Contoh NIP, sesuaikan jika perlu
            'jabatan' => 'Kepala LLDIKTI Wilayah II',
            'logo' => null, // Anda bisa tambahkan path logo jika tersedia
            'tahun' => date('Y'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
