<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Corrugated Box', 'Courier Bags', 'Streach Film', 'BOPP Tapes'] as $content) {
        	Category::create([
	        	'name' => $content,
	        	'slug' => str_slug($content)
	        ]);
        }
    }
}
