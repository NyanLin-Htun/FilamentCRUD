<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Silver','Gold','Platinum','Diamond']),
            'slug' => Str::slug($this->faker->unique()->name, '-'),
            'description' => $this->faker->sentence(),
            'is_active' => $this->faker->boolean(),
            'is_hidden' => $this->faker->boolean(),
            'price' => $this->faker->randomNumber(4),
            'currency' => $this->faker->randomElement(['MMK','USD']),
            'plan_type' => $this->faker->randomElement(['Monthly','Yearly']),
        ];
    }

    public function silverPlan()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Silver',
            ];
        });
    }

    public function goldPlan()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Gold',
            ];
        });
    }

    public function platinumPlan()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Platinum',
            ];
        });
    }

    public function diamondPlan()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Diamond',
            ];
        });
    }
}
