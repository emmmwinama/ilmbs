<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=40;$i++){
            Loan::create([
                'account_id' => $i,
                'loan_amount' => fake()->randomFloat(2, 50000, 10000000),
                'loan_term' => mt_rand(1 , 60),
                'interest_rate' => 34.5,
                'status' => 'pending',
            ]);
        }
    }
}
