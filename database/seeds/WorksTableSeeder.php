<?php

use Illuminate\Database\Seeder;

/**
 * Class WorksTableSeeder
 */
class WorksTableSeeder extends Seeder
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
                'text' => 'You have to write somrthing awesome here',
                'description' => 'Test description',
            ]);

            DB::table('work_translations')->insert([
                'work_id' => $workID,
                'locale' => 'ru',
                'title' => 'Работа',
                'text' => 'Вы должны здесь написать что-то потрясающее',
                'description' => 'Тестовое описание',
            ]);

        } else {
            $this->command->info('You have already a work');
        }
    }
}
