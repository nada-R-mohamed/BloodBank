<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutePermissionGovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //governorates
        DB::table('permissions')
            ->where('name', 'governorates create')
            ->update(['route'=>'governorates.create']);

        DB::table('permissions')
            ->where('name', 'governorates view')
            ->update(['route'=>'governorates.index']);

        DB::table('permissions')
            ->where('name', 'governorates edit')
            ->update(['route'=>'governorates.edit']);

        DB::table('permissions')
            ->where('name', 'governorates delete')
            ->update(['route'=>'governorates.destroy']);

    }
}
