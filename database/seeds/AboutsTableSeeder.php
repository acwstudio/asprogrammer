<?php

use Illuminate\Database\Seeder;

/**
 * Class AboutsTableSeeder
 */
class AboutsTableSeeder extends Seeder
{
    use \App\Traits\ManageImages;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setItemsFromConfig('preset');

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
                'text' => 'Unfortunately, this article has not been translated into English.',
                'description' => 'Test description',
            ]);

            DB::table('about_translations')->insert([
                'about_id' => $aboutID,
                'locale' => 'ru',
                'title' => 'Обо мне',
                'text' => 'К сожалению, эта статья не переведена на русский язык.',
                'description' => 'Тестовое описание',
            ]);

        } else {
            $this->command->info('You have already an about');
        }
    }
}
