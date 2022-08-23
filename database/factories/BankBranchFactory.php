<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankBranch>
 */
class BankBranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'branch_name'=>$this->faker->name(),
            'state_or_division_id'=>$this->faker->numerify('###'),
            'address'=>$this->faker->address(),
            'phone'=>$this->faker->numerify('09#########'),
            'fax'=>$this->faker->text(10),
            'remark'=>$this->faker->text(10),
        ];
    }
}
