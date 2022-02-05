<?php

namespace Database\Seeders;

use App\Models\Friend;
use Illuminate\Database\Seeder;

class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Friend::create([
            'user_id_sender' => 3,
            'user_id_receiver' => 4,
            'approved' => true,
            'blocked' => false
        ]);
        Friend::create([
            'user_id_sender' => 3,
            'user_id_receiver' => 5,
            'approved' => true,
            'blocked' => false
        ]);
        Friend::create([
            'user_id_sender' => 3,
            'user_id_receiver' => 6,
            'approved' => true,
            'blocked' => false
        ]);



        Friend::create([
            'user_id_sender' => 3,
            'user_id_receiver' => 4,
            'approved' => false,
            'blocked' => false
        ]);
        Friend::create([
            'user_id_sender' => 3,
            'user_id_receiver' => 5,
            'approved' => false,
            'blocked' => false
        ]);
        Friend::create([
            'user_id_sender' => 3,
            'user_id_receiver' => 6,
            'approved' => false,
            'blocked' => false
        ]);




        Friend::create([
            'user_id_sender' => 7,
            'user_id_receiver' => 3,
            'approved' => true,
            'blocked' => false
        ]);
        Friend::create([
            'user_id_sender' => 8,
            'user_id_receiver' => 3,
            'approved' => true,
            'blocked' => false
        ]);
        Friend::create([
            'user_id_sender' => 9,
            'user_id_receiver' => 3,
            'approved' => true,
            'blocked' => false
        ]);

        Friend::create([
            'user_id_sender' => 7,
            'user_id_receiver' => 3,
            'approved' => false,
            'blocked' => false
        ]);
        Friend::create([
            'user_id_sender' => 8,
            'user_id_receiver' => 3,
            'approved' => false,
            'blocked' => false
        ]);
        Friend::create([
            'user_id_sender' => 9,
            'user_id_receiver' => 3,
            'approved' => false,
            'blocked' => false
        ]);

        Friend::create([
            'user_id_sender' => 3,
            'user_id_receiver' => 10,
            'approved' => false,
            'blocked' => true
        ]);
        Friend::create([
            'user_id_sender' => 3,
            'user_id_receiver' => 11,
            'approved' => false,
            'blocked' => true
        ]);
        Friend::create([
            'user_id_sender' => 3,
            'user_id_receiver' => 12,
            'approved' => false,
            'blocked' => true
        ]);
    }
}
