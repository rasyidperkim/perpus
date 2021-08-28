<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   

        $randomNumber = rand(1,25);
        $cover = "https://picsum.photos/id/{$randomNumber}/200/300";

        return [
            'author_id'=> Author::inRandomOrder()->first()->id,
            'title'=>$this->faker->sentence(3),
            'description'=>$this->faker->sentence(30),
            'cover'=>$cover,
            'qty'=>$randomNumber,
        ];
    }
}
