<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutePermissionPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //posts
        DB::table('permissions')
            ->where('name', 'posts create')
            ->update(['route'=>'posts.create']);

        DB::table('permissions')
            ->where('name', 'posts view')
            ->update(['route'=>'posts.index']);

        DB::table('permissions')
            ->where('name', 'posts edit')
            ->update(['route'=>'posts.edit']);

        DB::table('permissions')
            ->where('name', 'posts delete')
            ->update(['route'=>'posts.destroy']);
    }
}
