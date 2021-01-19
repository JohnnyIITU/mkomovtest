<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = Comment::factory()->count(100)->make();
        $comments->each(function (Comment $comment) {
           $comment->post_id = Post::inRandomOrder()->first()->id;
           $comment->save();
        });
    }
}
