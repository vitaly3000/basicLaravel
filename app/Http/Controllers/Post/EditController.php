<?php

namespace App\Http\Controllers\Post;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Post\BaseController;

class EditController extends BaseController {
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags =Tag::all();

        return view('post/edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
}
