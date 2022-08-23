<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\BankBranch;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BankAccount::truncate();
        $employees = Employee::all();
        $employees->each(function($employee){
            $branch = BankBranch::all();
            BankAccount::factory()->create([
                'bank_branch_id' => $branch->random()->id,
                'employee_id' => $employee->id,
            ]);
       });
    }
}
