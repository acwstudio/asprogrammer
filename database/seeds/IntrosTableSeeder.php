<?php

use Illuminate\Database\Seeder;

/**
 * Class IntrosTableSeeder
 */
class IntrosTableSeeder extends Seeder
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

        if (DB::table('intros')->count() === 0){
            $introID = DB::table('intros')->insertGetId([
                'alias' => $fakerEN->word,
                'img_name' => 'pic02',
                'img_extension' => 'jpg',
            ]);

            DB::table('intro_translations')->insert([
                'intro_id' => $introID,
                'locale' => 'en',
                'title' => 'Intro',
                'text' => 'You have to write somrthing awesome here',
                'description' => 'Test description',
            ]);

            DB::table('intro_translations')->insert([
                'intro_id' => $introID,
                'locale' => 'ru',
                'title' => 'Интро',
                'text' => 'Вы должны здесь написать что-то потрясающее',
                'description' => 'Тестовое описание',
            ]);

        } else {
            $this->command->info('You have already an intro');
        }
    }
}
