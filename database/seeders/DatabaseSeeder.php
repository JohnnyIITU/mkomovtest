<?php

namespace Database\Seeders;

use App\Models\Post;
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
        $this->call([
            PostSeeder::class,
            TagSeeder::class,
            CommentSeeder::class,
            PostTagSeeder::class,
        ]);
    }
}
