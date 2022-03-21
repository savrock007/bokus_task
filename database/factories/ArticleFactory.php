<?php

namespace Database\Factories;

use App\models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'article_name' => $this->faker->name,
            'article_text' => $this->faker->realText($maxNbChars = 3000),
            'likes'=> 0,
            'added_at' =>$this->faker->dateTime()->format('Y-m-d'),
        ];
    }
}
