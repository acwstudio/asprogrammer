<?php

use Illuminate\Database\Seeder;

/**
 * Class WorksTableSeeder
 */
class WorksTableSeeder extends Seeder
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

        if (DB::table('works')->count() === 0){
            $workID = DB::table('works')->insertGetId([
                'alias' => $fakerEN->word,
                'img_name' => 'pic02',
                'img_extension' => 'jpg',
            ]);

            DB::table('work_translations')->insert([
                'work_id' => $workID,
                'locale' => 'en',
                'title' => 'Work',
                'text' => 'Unfortunately, this article has not been translated into English.',
                'description' => 'Test description',
            ]);

            DB::table('work_translations')->insert([
                'work_id' => $workID,
                'locale' => 'ru',
                'title' => 'Работа',
                'text' => 'К сожалению, эта статья не переведена на русский язык.',
                'description' => 'Тестовое описание',
            ]);

        } else {
            $this->command->info('You have already a work');
        }
    }
}
