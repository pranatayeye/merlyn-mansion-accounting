<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // role
        $masterRole = Role::create(['name' => 'master']);
        $financeRole = Role::create(['name' => 'finance']);

        // permission
        $dashboard = Permission::create(['name' => 'dashboard']);
        $readTransaction = Permission::create(['name' => 'readTransaction']);
        $createTransaction = Permission::create(['name' => 'createTransaction']);
        $deleteTransaction = Permission::create(['name' => 'deleteTransaction']);
        $readReport = Permission::create(['name' => 'readReport']);
        $readUser = Permission::create(['name' => 'readUser']);
        $createUser = Permission::create(['name' => 'createUser']);
        $editRoleUser = Permission::create(['name' => 'editRoleUser']);
        $deleteUser = Permission::create(['name' => 'deleteUser']);
        $readLog = Permission::create(['name' => 'readLog']);

        // give permission to role
        $masterRole->givePermissionTo([
            $dashboard,
            $readTransaction,
            $createTransaction,
            $deleteTransaction,
            $readReport,
            $readUser,
            $createUser,
            $editRoleUser,
            $deleteUser,
            $readLog,
        ]);

        $financeRole->givePermissionTo([
            $dashboard,
            $readTransaction,
            $createTransaction,
            $deleteTransaction,
            $readReport,
        ]);

        // get user
        $owner = User::find(1);
        $finance = User::find(2);

        // give role to user
        $owner->assignRole($masterRole);
        $finance->assignRole($financeRole);
    }
}
