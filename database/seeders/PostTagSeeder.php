<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        foreach (Post::all() as $post){
            for ($i = 0; $i < rand(1, 3);$i++){
                $postTag = new PostTag();
                $postTag->post_id = $post->id;
                $postTag->tag_id = Tag::inRandomOrder()->first()->id;
                $postTag->save();
            }
        }
    }
}
