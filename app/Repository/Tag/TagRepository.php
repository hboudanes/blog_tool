<?php

namespace App\Repository\Tag;

// use App\Http\Requests\CreateTagRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TagRepository
{
    protected $user;

    public function __construct(?User $user)
    {

        $this->user = $user ?? User::find(Auth::id());
    }
    public  function getTags()
    {
        return  $this->user->tags()->get();
    }
}
