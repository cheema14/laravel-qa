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
        // definition of each method
        // It means each time a user is created, something(function) would be done as well

        // there is a difference between create and make method
        // create will insert data into the database while 
        // make will create new objects and store them in memory
        
        factory(App\User::class, 3)->create()->each(function ($user){
            $user->questions()
                ->saveMany(
                    factory(App\Question::class, rand(1,5))->make()
                );
        });
    }
}
