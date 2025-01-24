@extends('layouts.main')
{{-- @php
    use App\Enums\InputType;
@endphp --}}
@section('title','create new post')
@section('childContent')
    <h1>Create New Post</h1>

    <form method="POST" action="{{ route('post.store') }}">
        @csrf
        
            <x-form-input for="title",type="text" id="title" name="title" required>
                <!-- Title Input -->
                <div>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <!-- Slug Input -->
                <div>
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" name="slug" required>
                </div>

                <!-- Content Textarea -->
                <div>
                    <label for="content">Content:</label>
                    <textarea id="content" name="content">Hello, World!</textarea>
                </div>

                <!-- Tags Dropdown -->
                <div>
                    <label for="tags">Tags:</label>
                    <select id="tags" name="tags[]" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit">Create Post</button>
                </div>
    </form>
@endsection
