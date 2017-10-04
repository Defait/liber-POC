<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $usersFirstId = DB::table('users')->first()->id;
        $usersLastId = DB::table('users')->orderBy('id', 'desc')->first()->id;

        foreach(range(1, 10) as $index)
        {
            $title = $faker->unique()->sentences(1, true);

            App\Series::create([
                'name' => $title, 
                'slug' => str_slug($title),
                'user_id' =>  $faker->numberBetween($usersFirstId, $usersLastId),
            ]);
        }
    }
}
