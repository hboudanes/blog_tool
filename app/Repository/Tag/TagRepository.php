<?php

namespace App\Repository\Tag;

use App\Http\Requests\CreateTagRequest;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TagRepository
{
    protected $user;

    public function __construct(?User $user)
    {

        $this->user = $user ?? User::find(Auth::id());
    }
    public  function get()
    {
        return  $this->user->tags()->get();
    }
    public function store(CreateTagRequest $request)
    {
        return $this->user->tags()->create($request->validated());
    }
    public function update(CreateTagRequest $request, Tag $tag)
    {
        $validatedData = $request->validated();


        // Create the post
        $tag->update($validatedData);
    }
}
