<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
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
        
        $seriesFirstId = DB::table('series')->first()->id;
        $seriesLastId = DB::table('series')->orderBy('id', 'desc')->first()->id;

        foreach(range(1, 100) as $index)
        {
            $title = $faker->unique()->sentences(1, true);

            App\Book::create([
                'title' => $title,
                'slug' => str_slug($title), 
                'series_id' => $faker->numberBetween($seriesFirstId, $seriesLastId),
                'user_id' => $faker->numberBetween($usersFirstId, $usersLastId),
            ]);
        }
    }
}
