<?php

namespace App\Repository\Post;

use App\Http\Requests\CreatePostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostRepository
{
    protected $user;

    public function __construct(?User $user)
    {

        $this->user = $user ?? User::find(Auth::id());
    }

    public function getPosts()
    {

        return $this->user->posts()->get();
    }

    public function storePost(CreatePostRequest $request)
    {
        $validatedData = $request->validated();


        // Create the post
        $post = $this->user->posts()->create($validatedData);

        // Attach tags if provided
        if ($request->has('tags')) {
            $post->tags()->attach($request->input('tags'));
        }

        return $post;
    }
}
