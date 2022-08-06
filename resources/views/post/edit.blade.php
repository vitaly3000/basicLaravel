@extends('layouts.main')
@section('content')

<form action="{{ route('post.update',$post->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label for="postTitle" class="form-label">Title</label>
        <input type="text" class="form-control" id="postTitle" name="title" value="{{ $post->title }}">
    </div>
    <div class="mb-3">
        <label for="postContent" class="form-label">Content</label>
        <textarea  class="form-control" id="postContent" name="content" >{{ $post->content }} </textarea>
    </div>
    <label for="category" class="form-label">Category</label>
    <select class="form-select mb-3"  id="category" name="category_id">
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : ''}}>{{ $category->title }}</option>
        @endforeach
    </select>
    <label for="tags" class="form-label">Tags</label>
    <select class="form-select mb-3" multiple id="tags" name="tags[]">

        @foreach ($tags as $tag)
                <option
                @foreach ($post->tags as $PostTag)
                    {{ $tag->id === $PostTag->id ? 'selected' : ''}}
                @endforeach
                value="{{ $tag->id }}">{{ $tag->title }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
