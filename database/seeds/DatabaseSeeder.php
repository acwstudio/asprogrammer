<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(HeadersTableSeeder::class);
         $this->call(IntrosTableSeeder::class);
         $this->call(AboutsTableSeeder::class);
         $this->call(WorksTableSeeder::class);
         $this->call(SitesTableSeeder::class);
    }
}
