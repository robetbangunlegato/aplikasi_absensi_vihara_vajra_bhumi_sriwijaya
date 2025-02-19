<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // membuat role
        $role_super_admin = Role::updateOrCreate(
            ['name' => 'super admin']
        );

        $role_admin = Role::updateOrCreate(
            ['name' => 'admin']
        );

        $role_employee = Role::updateOrCreate(
            ['name' => 'pegawai']
        );

        // membuat permission
        // $permission_view_dashboard = Permission::updateOrCreate(
        //     ['name' => 'view dashboard']
        // );
        // $permission_view_absensi = Permission::updateOrCreate(
        //     ['name' => 'view absensi']
        // );
        // $permission_view_catatan_gaji = Permission::updateOrCreate(
        //     ['name' => 'view catatangaji']
        // );
        // $permission_view_kelola_jabatan = Permission::updateOrCreate(
        //     ['name' => 'view kelolajabatan']
        // );
        // $permission_view_kelola_pengguna = Permission::updateOrCreate(
        //     ['name' => 'view kelolapengguna']
        // );

        // memberikan permission kepada role

        // super admin
        // $role_super_admin->givePermissionTo($permission_create_kelola_pengguna);

        // admin

        // $role_admin->givePermissionTo($permission_view_kelola_jabatan);
        // $role_admin->givePermissionTo($permission_view_absensi);
        // $role_admin->givePermissionTo($permission_view_catatan_gaji);
        // $role_admin->givePermissionTo($permission_view_kelola_jabatan);
        // $role_admin->givePermissionTo($permission_view_kelola_pengguna);
        // $role_admin->givePermissionTo($permission_create_kelola_jabatan);

        //pegawai
        // $role_employee->givePermissionTo($permission_view_dashboard);
        // $role_employee->givePermissionTo($permission_view_absensi);
        // $role_employee->givePermissionTo($permission_view_catatan_gaji);
        // $role_employee->givePermissionTo($permission_view_kelola_jabatan);

        // memberikan role kepada user
        // user id 1
        $user = User::find(1);
        $user->assignRole('admin');

        // user id 15
        $user = User::find(15);
        $user->assignRole('employee');
        
    }
}
