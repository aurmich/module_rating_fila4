<?php

namespace Modules\Rating\Database\Factories;

<<<<<<< HEAD
use Modules\Rating\Models\Rating;
=======
<<<<<<< HEAD
use Modules\Rating\Models\Rating;
=======
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = Rating::class;
=======
<<<<<<< HEAD
    protected $model = Rating::class;
=======
    protected $model = \Modules\Rating\Models\Rating::class;
>>>>>>> origin/develop
>>>>>>> d06edcd (.)

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

