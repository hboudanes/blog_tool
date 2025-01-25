<?php

namespace App\Repository\Post;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostRepository
{
    protected $user;

    public function __construct(?User $user)
    {

        $this->user = $user ?? User::find(Auth::id());
    }

    public function get()
    {

        return $this->user->posts()->get();
    }

    public function store(CreatePostRequest $request)
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
    public function update(CreatePostRequest $request, Post $post)
    {
        $validatedData = $request->validated();


        // Create the post
        $post->update($validatedData);

        // Attach tags if provided aproche 1
        if ($request->has('tags')) {
            $post->tags()->sync($request->input('tags'));
        }



        return $post;
    }
}
