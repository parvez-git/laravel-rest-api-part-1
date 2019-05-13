<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        for ($i=1; $i < 10; $i++) { 
            DB::table('post_tag')->insert([
                'post_id' => rand(1,10),
                'tag_id' => rand(1,10)
            ]);
        }
    }
}
