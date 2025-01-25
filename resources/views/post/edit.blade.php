@extends('layouts.app')
@section('title','create new post')

@section('content')
    <h1>Edit Post</h1>

    <x-form method="PUT" action="{{ route('post.update', $post) }}" submit="Create Post">

        <!-- Title Input -->
        <x-form-input for="title" type="text" id="title" name="title" labelName="Title" required>
            {{ $post->title }}
        </x-form-input>
        <!-- Slug Input -->
        <x-form-input for="slug" type="text" id="slug" labelName="Slug:" name="slug" required>
            {{ $post->title }}
        </x-form-input>
        <!-- Content Textarea -->
        <x-form-input inputType="textarea" for="content" id="content" name="content" labelName="Content:">
            {{ $post->content }}
        </x-form-input>
        <!-- Tags Dropdown -->
        <x-form-input inputType="select" for="tags" id="tags" name="tags[]" labelName="Tags:" multiple>
            @foreach ($tags as $v)
                <option value="{{ $v->id }}" @selected($post->tags->contains($v->id))>{{ $v->name }}</option>
            @endforeach
        </x-form-input>
    </x-form>
  
@endsection
