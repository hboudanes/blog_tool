@extends('layouts.app')
@section('title','create new post')

@section('content')
    <h1>{{ $post->title }}</h1>

    <!-- Display Post Slug -->
    <p><strong>Slug:</strong> {{ $post->slug }}</p>

    <!-- Display Post Content -->
    <div>
        <strong>Content:</strong>
        {!! $post->content !!}
    </div>

    <!-- Display Tags -->
    <div>
        <strong>Tags:</strong>
        @foreach ($post->tags as $tag)
            <span class="badge badge-primary">{{ $tag->name }}</span>
        @endforeach
    </div>

    <!-- Back Button -->
    <div>
        <a href="{{ route('post.index') }}" class="btn btn-secondary">Back to Posts</a>
    </div>
@endsection