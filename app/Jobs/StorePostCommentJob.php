<?php

namespace App\Jobs;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StorePostCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $post;
    private $subject;
    private $body;

    public function __construct($args, Post $post)
    {
        $this->post = $post;
        $this->body = $args['body'];
        $this->subject = $args['subject'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $comment = new Comment();
        $comment->post_id = $this->post->id;
        $comment->subject = $this->subject;
        $comment->body = $this->body;
        $comment->save();
    }
}
