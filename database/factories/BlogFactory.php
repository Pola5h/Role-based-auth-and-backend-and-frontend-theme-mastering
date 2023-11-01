<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3, 10)),
            'slug' => $this->faker->slug(),
            'thumbnail' => '1698719592_65406768e2e42.jpg',
            'banner' => '1698719593_65406769682ec.jpg',
            'content' => implode("\n\n", $this->faker->paragraphs(mt_rand(5, 15))),
            'author_id' => User::all()->random()->id,
            'last_modified' => Carbon::now()->subDays(mt_rand(0, 30)),
            'category_id' =>  Category::all()->random()->id,
            'tags' =>  Tag::all()->random()->name,
            'visits_count' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
