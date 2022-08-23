<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::truncate();
        Plan::factory(1)->silverPlan()->create();
        Plan::factory(1)->goldPlan()->create();
        Plan::factory(1)->platinumPlan()->create();
        Plan::factory(1)->diamondPlan()->create();
    }
}
