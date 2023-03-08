<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleAndPermisionsSeeder::class,
            UserSeeder::class
        ]);
//        Category::factory(8)->create();
//        Post::factory(14)->create();
        // \App\Models\User::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Nada Raafat',
//             'email' => 'nada@admin.com',
//             'password' => Hash::make('password'),
//         ]);
    }
}
