<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\PostFilterRequest;
use App\Models\Post;

class IndexController extends BaseController {
    public function __invoke(PostFilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts =  Post::filter($filter)->paginate(10);
        return view('post/index', [
            'posts' => $posts,
            'detail' => false
        ]);
    }
}
