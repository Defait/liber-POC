<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        
        $tables = [
            'information',
            'chapters',
            'books',
            'series',
            'users',
        ];

        foreach($tables as $table)
        {
            DB::table($table)->delete();
        }

        $this->call(UserTableSeeder::class);
        $this->call(SeriesTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(ChapterTableSeeder::class);  
        $this->call(InformationTableSeeder::class);  
    }
}
