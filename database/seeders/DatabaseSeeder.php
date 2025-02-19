<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Absensi;
use Illuminate\Database\Seeder;
use App\Models\PengaturanAbsensi;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // MEMBUAT USER
        $super_admin  = User::updateOrCreate([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make(12345678)
        ]);


        // MEMBUAT WAKTU ABSENSI
        $absensi = PengaturanAbsensi::updateOrCreate([
            'waktu_buka' => '00:00',
            'waktu_tutup' => '00:00',
            'rentang_awal_IP' => '000.000.000.000',
            'rentang_akhir_IP' => '000.000.000.000', 
            'created_at' => now(),
            'updated_at' => now()
        ]);

         // DATA ROLE
        $role_super_admin = Role::updateOrCreate(
            ['name' => 'super admin']
        );

        $role_admin = Role::updateOrCreate(
            ['name' => 'admin']
        );

        $role_employee = Role::updateOrCreate(
            ['name' => 'pegawai']
        );

        $user = User::find(1);
        $user->assignRole('super admin');

    }
}
