@extends('layouts.main')
@section('content')
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="postTitle" class="form-label">Title</label>
            <input type="text" class="form-control" value="{{ old('title') }}" placeholder="title" id="postTitle" name="title">
            @error('title')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror

        </div>
        <div class="mb-3">
            <label for="postContent" class="form-label">Content</label>
            <textarea class="form-control" id="postContent" name="content" placeholder="content">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <label for="category" class="form-label">Category</label>
        <select class="form-select mb-3"  id="category" name="category_id">
            @foreach ($categories as $category)
              <option {{ $category->id == old('category_id') ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
        <label for="tags" class="form-label">Tags</label>
        <select class="form-select mb-3" multiple id="tags" name="tags[]">
            @foreach ($tags as $tag)
              <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
