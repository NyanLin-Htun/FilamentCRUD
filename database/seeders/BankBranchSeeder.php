<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\BankBranch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BankBranch::truncate();
        $banks = Bank::all();
        $banks->each(function($bank){
            BankBranch::factory(5)->create([
                'bank_id'=> $bank->id
            ]);
        });
    }
}
