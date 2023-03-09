<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutePermissionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //users
        DB::table('permissions')
            ->where('name', 'users create')
            ->update(['route'=>'users.create']);

        DB::table('permissions')
            ->where('name', 'users view')
            ->update(['route'=>'users.index']);

        DB::table('permissions')
            ->where('name', 'users edit')
            ->update(['route'=>'users.edit']);

        DB::table('permissions')
            ->where('name', 'users delete')
            ->update(['route'=>'users.destroy']);
    }
}
