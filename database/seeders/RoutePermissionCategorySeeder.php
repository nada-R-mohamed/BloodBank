<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutePermissionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //categories
        DB::table('permissions')
            ->where('name', 'categories create')
            ->update(['route'=>'categories.create']);

        DB::table('permissions')
            ->where('name', 'categories view')
            ->update(['route'=>'categories.index']);

        DB::table('permissions')
            ->where('name', 'categories edit')
            ->update(['route'=>'categories.edit']);

        DB::table('permissions')
            ->where('name', 'categories delete')
            ->update(['route'=>'categories.destroy']);
    }
}
