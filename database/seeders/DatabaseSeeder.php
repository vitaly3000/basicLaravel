<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::factory(20)->create();
        $tags = Tag::factory(50)->create();
        $posts = Post::factory(500)->create();

        foreach($posts as $post) {
            $tagsIds= $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsIds);
        }

    }
}
