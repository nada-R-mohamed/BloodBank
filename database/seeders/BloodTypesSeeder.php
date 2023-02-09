<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_types')->insert([
            'name' => 'A+',
            'created_at' => Carbon::now(),

        ]);
        DB::table('blood_types')->insert([

            'name' => 'A-',
            'created_at' => Carbon::now(),
        ]);

        DB::table('blood_types')->insert([

            'name' => 'B+',
            'created_at' => Carbon::now(),
        ]);

        DB::table('blood_types')->insert([

            'name' => 'B-',
            'created_at' => Carbon::now(),
        ]);

        DB::table('blood_types')->insert([
            'name' => 'O+',
            'created_at' => Carbon::now(),
        ]);

        DB::table('blood_types')->insert([
            'name' => 'O-',
            'created_at' => Carbon::now(),
        ]);

        DB::table('blood_types')->insert([
            'name' => 'AB+',
            'created_at' => Carbon::now(),
        ]);

        DB::table('blood_types')->insert([
            'name' => 'AB-',
            'created_at' => Carbon::now(),
        ]);
    }
}
