<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// We have relation to table 'users'
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     * Now we can set new record in 'tinker' like so:
     * Article::factory()->count(6)->create(['user_id' => 1]);
     * Get user(author): $author = Article::find($article->id)->author;
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'user_id' => User::factory(), // Relation 'one to many' with table 'users'
          'slug'    => $this->faker->unique()->word(),
          'excerpt' => $this->faker->sentence(),
          'title'   => $this->faker->sentence(),
          'body'    => $this->faker->paragraph(10)
        ];
    }
}
