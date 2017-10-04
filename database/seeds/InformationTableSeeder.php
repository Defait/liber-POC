<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class InformationTableSeeder extends Seeder
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

        $bookFirstId = DB::table('books')->first()->id;
        $bookLastId = DB::table('books')->orderBy('id', 'desc')->first()->id;


        foreach(range(1, 100) as $index)
        {
            $name = $faker->unique()->name;

            App\Information::create([
                'author' => $name,
                'synopsis' => $faker->paragraphs(4, true),
                'cover_img_location' => 'img/wukong.jpg',
                'chapters' => 30,
                'series_id' => $faker->numberBetween($seriesFirstId, $seriesLastId),
                'user_id' => $faker->numberBetween($usersFirstId, $usersLastId),
                'book_id' => $faker->numberBetween($bookFirstId, $bookLastId),
            ]);
        }
    }
}
