<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'password' => bcrypt('secret'),
            'phone_number' => [$this->faker->numerify('09#########')],
            'address' => $this->faker->address(),
            'photo' => $this->faker->imageUrl($width = 300, $height = 300),
        ];
    }
}
