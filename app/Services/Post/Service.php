<?php

namespace App\Services\Post;

use App\Models\Post;

class Service {
    public function store($data) {
        if(isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
            $post = Post::create($data);
            $post->tags()->attach($tags, ['created_at' => new \DateTime('now')]);
        }else {
            $post = Post::create($data);
        }
    }

    public function update($post,$data) {
        if(isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
            $post->update($data);

            $post->tags()->sync($tags, ['created_at' => new \DateTime('now')]);

            // foreach($tags as $tag) {
            //     PostTag::firstOrCreate([
            //         'tag_id' => $tag,
            //         'post_id' => $post->id,
            //     ]);
            // }
        }else {
            $post->update($data);
        }
    }
}
