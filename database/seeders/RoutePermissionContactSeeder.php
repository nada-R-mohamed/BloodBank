<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutePermissionContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //contacts
        DB::table('permissions')
            ->where('name', 'contacts view')
            ->update(['route'=>'contacts.index']);


        DB::table('permissions')
            ->where('name', 'contacts delete')
            ->update(['route'=>'contacts.destroy']);

    }
}
