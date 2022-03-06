<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;

use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $users = collect(User::where('id', '>', 2)->get()->modelKeys());

        for($i=0; $i<100; $i++){
            $post = Post::create([
                'body' => $faker->paragraph,
                'user_id' => $users->random()
            ]);
        }
    }
}
