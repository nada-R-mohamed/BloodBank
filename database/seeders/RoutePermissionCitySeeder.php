<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutePermissionCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //cities
        DB::table('permissions')
            ->where('name', 'cities create')
            ->update(['route'=>'cities.create']);

        DB::table('permissions')
            ->where('name', 'cities view')
            ->update(['route'=>'cities.index']);

        DB::table('permissions')
            ->where('name', 'cities edit')
            ->update(['route'=>'cities.edit']);

        DB::table('permissions')
            ->where('name', 'cities delete')
            ->update(['route'=>'cities.destroy']);
    }
}
