<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CmsSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(AppContentSeeder::class);
    }
}
