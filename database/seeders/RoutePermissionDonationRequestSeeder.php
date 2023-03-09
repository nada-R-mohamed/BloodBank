<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutePermissionDonationRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //donationRequests
        DB::table('permissions')
            ->where('name', 'donationRequests view')
            ->update(['route'=>'donation-requests.index']);

        DB::table('permissions')
            ->where('name', 'donationRequests delete')
            ->update(['route'=>'donation-requests.destroy']);
    }
}
