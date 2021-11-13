<?php

namespace Database\Seeders;

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
        DB::table('comments')->insert(['user_id' => -1, 'post_id' => 1, 'content' => 'first commnent', 'attachment' => null]);
        DB::table('comments')->insert(['user_id' => -1, 'post_id' => 1, 'content' => 'great article', 'attachment' => null]);
        DB::table('comments')->insert(['user_id' => -1, 'post_id' => 1, 'content' => 'lorem ipsum', 'attachment' => null]);
    }
}
