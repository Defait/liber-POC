<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        foreach(range(1, 20) as $index)
        {
            $name = $faker->unique()->name;

            App\User::create([
                'username' => $name, 
                'slug' => str_slug($name),
                'email' => $faker->email,
                'password' => Hash::make('koekje123'),
            ]);
        }
    }
}
