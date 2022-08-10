<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Filters\PostFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostFilterRequest;


class IndexController extends Controller {
    public function __invoke(PostFilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts =  Post::filter($filter)->paginate(10);

       return view('admin.post.index', [
        'posts' => $posts,
        'detail' => false
    ]);
    }
}
