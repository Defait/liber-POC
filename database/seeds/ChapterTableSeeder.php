<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ChapterTableSeeder extends Seeder
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
        
        $bookFirstId = DB::table('books')->first()->id;
        $bookLastId = DB::table('books')->orderBy('id', 'desc')->first()->id;

        foreach(range(1, 1000) as $index)
        {
            $title = $faker->unique()->sentence(6, true);

            App\Chapter::create([
                'title' => $title,
                'body' => $faker->paragraphs(10, true),
                'user_id' => $faker->numberBetween($usersFirstId, $usersLastId),
                'book_id' => $faker->numberBetween($bookFirstId, $bookLastId),
                'chapter_number' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
