<?php

use App\Models\AppContent;
use Illuminate\Database\Seeder;

class AppContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppContent::create([
        	'support_email' => 'support@packing.com',
			'support_mobile' => '1111111111',
			'address' => '1234k Avenue, 4th block, New York City',
        ]);
    }
}
