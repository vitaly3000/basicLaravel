@extends('layouts.admin')


@section('content')
<table class="table table-dark mb-3">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">content</th>
        <th scope="col">likes</th>
        <th scope="col">link</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
         <tr>
            <th>{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{!! $post->content !!}</td>
            <td>{{ $post->likes }}</td>
            <td><a class="btn btn-primary" href="{{route('post.show',$post->id) }}">Click</a></td>
            </tr>
        @endforeach
    </tbody>
  </table>

  {{$posts->withQueryString()->links()}}

@endsection
