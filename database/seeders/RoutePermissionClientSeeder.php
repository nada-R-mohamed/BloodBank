<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutePermissionClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //clients

        DB::table('permissions')
            ->where('name', 'clients view')
            ->update(['route'=>'clients.index']);

        DB::table('permissions')
            ->where('name', 'clients status')
            ->update(['route'=>'clients.status']);

        DB::table('permissions')
            ->where('name', 'clients delete')
            ->update(['route'=>'clients.destroy']);

        //contacts
        DB::table('permissions')
            ->where('name', 'contacts view')
            ->update(['route'=>'contacts.index']);

        DB::table('permissions')
            ->where('name', 'contacts delete')
            ->update(['route'=>'contacts.destroy']);
    }
}
