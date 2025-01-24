<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Repository\Post\PostRepository;
use App\Repository\Tag\TagRepository;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postRepository;
    protected $tagRepository;
    public function __construct()
    {
        $user = User::find(Auth::id());
        $this->postRepository = new PostRepository($user);
        $this->tagRepository = new TagRepository($user);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // PostRepository::getAllPosts();
        $posts = $this->postRepository->getPosts();
     
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Fetch all tags
        $tags = Tag::getTags();

        // Pass the tags to the view
        return view('post.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $this->postRepository->storePost($request);
        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        // Load the post with its tags
        $post->load('tags');
        // Pass the post to the view
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        
        $tags = $this->tagRepository->getTags();
        // Load the post with its tags
        $post->load('tags');
        // Pass the post to the view
        return view('post.edit', compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('status', 'post-deleted');
    }
}
