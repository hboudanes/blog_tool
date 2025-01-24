@extends('layouts.app')
@section('title','create new post')

@section('content')
    <h1>Edit Post</h1>

    
    <form method="POST" action="{{ route('post.update', $post) }}">
        @csrf
        @method('put')
        <!-- Title Input -->
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        </div>

        <!-- Slug Input -->
        <div>
            <label for="slug">Slug:</label>
            <input type="text" id="slug" name="slug" value="{{ $post->title }}" required>
        </div>

        <!-- Content Textarea -->
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content">value="{{ $post->content }}"</textarea>
        </div>

        <!-- Tags Dropdown -->
        <div>
            <label for="tags">Tags:</label>
            <select id="tags" name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" @selected($post->tags->contains($tag->id))>{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit">Create Post</button>
        </div>
    </form>
@endsection
