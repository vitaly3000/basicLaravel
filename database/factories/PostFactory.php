<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'likes' => random_int(1,10000),
            'is_published' => 1,
            'created_at' => new \DateTime('now'),
            'category_id' => Category::get()->random()->id
        ];
    }
}
