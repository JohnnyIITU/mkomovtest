<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Jobs\StorePostCommentJob;
use App\Jobs\StorePostLikeIncrementJob;
use App\Jobs\StorePostViewIncrementJob;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function posts(){
        return view('posts');
    }

    public function post(Request $request){
        $post = Post::find($request->id);
        return [
            'post' => $post,
            'tags' => $post->tags,
            'comments' => $post->comments
        ];
    }

    public function postById(Post $post){
        return view('post', compact('post'));
    }

    public function latest(){
        return Post::latest()
            ->take(6)
            ->get();
    }

    public function paginate(){
        return Post::latest()
            ->paginate(10);
    }

    public function like($post){
        $post = Post::find($post);
        StorePostLikeIncrementJob::dispatch($post);
        return $post->likes + 1;
    }

    public function view($post){
        $post = Post::find($post);
        StorePostViewIncrementJob::dispatch($post);
        return $post->views + 1;
    }

    public function comment(StoreCommentRequest $request, $post){
        $post = Post::find($post);
        StorePostCommentJob::dispatch($request->all(), $post);
    }
}
