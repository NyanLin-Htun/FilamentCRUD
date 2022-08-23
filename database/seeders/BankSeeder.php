<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Bank::truncate();

        Bank::factory(1)->bankAYA()->create();
        Bank::factory(1)->bankKBZ()->create();
        Bank::factory(1)->bankCB()->create();
        Bank::factory(1)->bankYOMA()->create();
        Bank::factory(1)->bankUAB()->create();
    }
}
