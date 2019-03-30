<?php

use App\Models\Cms;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['FAQ', 'Term & Condition'] as $content) {
        	Cms::create([
	        	'title' => $content,
	        	'description' => 'Description'
	        ]);
        }
    }
}
