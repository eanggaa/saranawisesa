<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProfilePerusahaan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama_panjang' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt(12345678),
            'level' => 'superadmin',
        ]);

        User::create([
            'nama_panjang' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345678),
            'level' => 'admin',
        ]);

        ProfilePerusahaan::create([
            'sejarah_perusahaan' => 'PT.SARANAWISESA PROPERINDO adalah anak perusahaan Perumda Pembangunan Sarana Jaya ( BUMD milik Pemerintah Provinsi DKI Jakarta ) berdiri sejak tanggal 3 Februari 1993 yang bergerak dibidang Property. Seiring dengan perkembangan perusahaan yang semakin pesat maka kami melakukan diversifikasi usaha dengan mengembangkan bisnis baru di bidang Sarana Parkir, Management Properti, Agen Properti, Supplier serta Interior & Landscape.',
            'visi' => 'Menjadi Perusahaan Pengembang yang Terkemuka dan Berkelanjutan di Indonesia',
            'misi' => 'Mengembangkan bisnis properti yang mendukung strategi dan program kerja Pemerintah Provinsi Daerah Khusus Ibukota Jakarta# Menjalin kemitraan strategis untuk menciptakan nilai (value creation) produk dan jasa yang dapat memberikan manfaat kepada masyarakat luas# Berperan aktif dalam mendorong pembangunan kawasan di perkotaan',
        ]);
    }
}
