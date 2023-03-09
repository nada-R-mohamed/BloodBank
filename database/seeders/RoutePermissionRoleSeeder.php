<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutePermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles
        DB::table('permissions')
            ->where('name', 'roles create')
            ->update(['route'=>'roles.create']);

        DB::table('permissions')
            ->where('name', 'roles view')
            ->update(['route'=>'roles.index']);

        DB::table('permissions')
            ->where('name', 'roles edit')
            ->update(['route'=>'roles.edit']);

        DB::table('permissions')
            ->where('name', 'roles delete')
            ->update(['route'=>'roles.destroy']);

    }
}
