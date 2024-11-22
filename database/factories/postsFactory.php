<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class postsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title= $this->faker->realText(50,2);
        return [
           'title'=> $title,
           'slug'=> Str::slug($title),
           'body'=> $this->faker->paragraph,
           'image'=> $this->faker->imageUrl(640,480),


        ];
    }
}
