<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Models\Tag;
use App\Models\User;
use App\Repository\Tag\TagRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    protected $tagRepository;
    public function __construct()
    {
        $user = User::find(Auth::id());

        $this->tagRepository = new TagRepository($user);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = $this->tagRepository->get();

        return view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all tags
        $tags =  $this->tagRepository->get();
        return view('tag.index', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTagRequest $request)
    {


        // Create the tag
        $this->tagRepository->store($request);

        // Redirect with a success message
        return redirect()->route('tag.index')->with('success', 'Tag created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $tags =  $this->tagRepository->get();
        return view('tag.index', compact('tag','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateTagRequest $request, Tag $tag)
    {
        $this->tagRepository->update($request, $tag);
        return redirect()->route('tag.index')->with('success', 'Tag update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index')->with('success', 'tag-deleted');
    }
}
