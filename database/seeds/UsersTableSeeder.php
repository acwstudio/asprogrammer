<?php

use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->count() === 0) {
            DB::table('users')->insert([
                'email' => 'admin@admin.loc',
                'name' => 'Andrey',
                'password' => Hash::make(config('asprogrammer.password')),
                'remember_token' => Illuminate\Support\Str::random(10),
            ]);
        } else {
            $this->command->info('You have already a user');
        }
    }
}
