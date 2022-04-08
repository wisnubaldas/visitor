<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PintuMasuk;
use App\Models\PintuKeluar;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create data user
        $userCreate = User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('password')
        ]);

        // $pintumasukCreate = PintuMasuk::create([
        //     'id_alat'      => 'PM-01',
        //     'pintu_masuk_01'     => '0',
        // ]);
        // $pintukeluarCreate = PintuKeluar::create([
        //     'id_alat'      => 'PK-01',
        //     'pintu_keluar_01'     => '0',
        // ]);
        //assign permission to role
        $role = Role::find(1);
        $permissions = Permission::all();

        $role->syncPermissions($permissions);

        //assign role with permission to user
        $user = User::find(1);
        $user->assignRole($role->name);
    }
}
