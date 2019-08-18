<?php

use Illuminate\Database\Seeder;

/**
 * Class AboutsTableSeeder
 */
class AboutsTableSeeder extends Seeder
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

        if (DB::table('abouts')->count() === 0){
            $aboutID = DB::table('abouts')->insertGetId([
                'alias' => $fakerEN->word,
                'img_name' => 'pic01',
                'img_extension' => 'jpg',
            ]);

            DB::table('about_translations')->insert([
                'about_id' => $aboutID,
                'locale' => 'en',
                'title' => 'About Me',
                'text' => 'You have to write somrthing awesome here',
                'description' => 'Test description',
            ]);

            DB::table('about_translations')->insert([
                'about_id' => $aboutID,
                'locale' => 'ru',
                'title' => 'Обо мне',
                'text' => 'Вы должны здесь написать что-то потрясающее',
                'description' => 'Тестовое описание',
            ]);

        } else {
            $this->command->info('You have already an about');
        }
    }
}
