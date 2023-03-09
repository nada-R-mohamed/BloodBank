<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutePermissionSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //settings
        DB::table('permissions')
            ->where('name', 'settings view')
            ->update(['route'=>'settings.index']);

        DB::table('permissions')
            ->where('name', 'settings edit')
            ->update(['route'=>'settings.edit']);
    }
}
