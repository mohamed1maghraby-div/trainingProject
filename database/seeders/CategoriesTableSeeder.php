<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'un-categorized', 'status' => 1]);
        Category::create(['name' => 'Sports', 'status' => 1]);
        Category::create(['name' => 'Cars', 'status' => 1]);
        Category::create(['name' => 'Engineering', 'status' => 0]);
    }
}
