<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bank_name' => $this->faker->randomElement(['KBZ','UAB','AYA','CB','YOMA']),
            'address' => $this->faker->address(),
            'phone' => $this->faker->numerify('09#########'),
            'fax' => $this->faker->text(10),
            'remark' => $this->faker->text(10),
        ];
    }

    public function bankAYA()
    {
        return $this->state(function (array $attributes) {
            return [
                'bank_name' => 'AYA',
            ];
        });
    }

    public function bankKBZ()
    {
        return $this->state(function (array $attributes) {
            return [
                'bank_name' => 'KBZ',
            ];
        });
    }

    public function bankCB()
    {
        return $this->state(function (array $attributes) {
            return [
                'bank_name' => 'CB',
            ];
        });
    }

    public function bankYOMA()
    {
        return $this->state(function (array $attributes) {
            return [
                'bank_name' => 'YOMA',
            ];
        });
    }

    public function bankUAB()
    {
        return $this->state(function (array $attributes) {
            return [
                'bank_name' => 'UAB',
            ];
        });
    }
}
