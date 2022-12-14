<?php

namespace Database\Factories\Task;

use App\Models\Task\TaskTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
