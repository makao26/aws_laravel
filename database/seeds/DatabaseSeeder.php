<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(Contact_categoriesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
