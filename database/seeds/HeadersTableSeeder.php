<?php

use Illuminate\Database\Seeder;

/**
 * Class HeadersTableSeeder
 */
class HeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakerRU = Faker\Factory::create('ru_RU');
        $fakerEN = Faker\Factory::create('en_GB');

        if (DB::table('headers')->count() === 0){
            $headerID = DB::table('headers')->insertGetId([
                'alias' => $fakerEN->word,
                'icon' => 'fa-gem',
            ]);

            DB::table('header_translations')->insert([
                'header_id' => $headerID,
                'locale' => 'en',
                'title' => 'Modern Apps',
                'text' => 'Web applications created from scratch. No CMS WordPress and other programming simulations',
                'description' => 'Test description',
            ]);

            DB::table('header_translations')->insert([
                'header_id' => $headerID,
                'locale' => 'ru',
                'title' => 'Современный WEB',
                'text' => 'Сайты написанные с нуля. Никаких CMS WORDPRESS и прочих симулякров программирования!',
                'description' => 'Тестовое описание',
            ]);

        } else {
            $this->command->info('You have already an header');
        }
    }
}
