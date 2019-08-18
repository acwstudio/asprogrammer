<?php

use Illuminate\Database\Seeder;

/**
 * Class SitesTableSeeder
 */
class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('sites')->count() === 0){
            DB::table('sites')->insert([
                'header_id' => DB::table('headers')->first()->id,
                'about_id' => DB::table('abouts')->first()->id,
                'intro_id' => DB::table('intros')->first()->id,
                'work_id' => DB::table('works')->first()->id,
            ]);

        } else {
            $this->command->info('You have already a site');
        }
    }
}
