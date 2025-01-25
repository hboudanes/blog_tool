@extends('layouts.app')

@php
    use App\Enum\InputType;
@endphp
@section('title', 'create new post')
@section('content')

    <h1>Create New Post</h1>


    <x-form method="POST" action="{{ route('post.store') }}">

        <!-- Title Input -->
        <x-form-input for="title" type="text" id="title" name="title" labelName="Title" required>

        </x-form-input>

        <!-- Slug Input -->
        <x-form-input for="slug" type="text" id="slug" labelName="Slug:" name="slug" required>

        </x-form-input>
        <!-- Content Textarea -->
        <x-form-input inputType="textarea" for="content" id="content" name="content" labelName="Content:">
            Hello world!
        </x-form-input>
        <x-form-input inputType="select" for="content" id="content" name="content" labelName="tags" multiple>
            @foreach ($tags as $v)
                <option value="{{ $v->id }}">{{ $v->name }}</option>
            @endforeach
        </x-form-input>
    </x-form>

@endsection
