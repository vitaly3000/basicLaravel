@extends('layouts.main')
@section('content')
    <table class="table table-dark mb-3">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th scope="col">likes</th>
            @if (!$detail)
                <th scope="col">link</th>
            @endif
            @if ($detail)
            <th scope="col"></th>
            <th scope="col"></th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
             <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{!! $post->content !!}</td>
                <td>{{ $post->likes }}</td>
                @if (!$detail)
                    <td><a class="btn btn-primary" href="{{route('post.show',$post->id) }}">Click</a></td>
                @endif
                @if ($detail)
                    <td><a class="btn btn-primary" href="{{route('post.edit',$post->id) }}">Edit</a></td>
                @endif
                @if ($detail)
                    <td><a class="btn btn-danger" href="{{route('post.delete',$post->id) }}">Delete</a></td>
                @endif
                </tr>
            @endforeach
        </tbody>
      </table>

      @if (count($posts) > 1)

          {{$posts->withQueryString()->links()}}
      @endif
      @if ($detail)
          <a class="btn btn-primary" href="{{ route('posts.index') }}">Back list</a>
      @endif
@endsection
