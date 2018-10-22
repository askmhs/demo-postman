<?php

/**
 * @Author: fatoni
 * @Date:   2018-10-22 16:06:32
 * @Last Modified by:   fatoni
 * @Last Modified time: 2018-10-22 16:16:55
 */
use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 30)->create()
        ->each(function ($category) {
        	$category->products()->saveMany(factory(App\Product::class, 10)->make());
            // $category->products()->save(factory(App\Product::class)->make());
        });
    }
}