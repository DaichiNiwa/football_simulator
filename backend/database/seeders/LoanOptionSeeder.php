<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loanOptions = [
            [
                'pelica_amount' => 2,
                'repay_deadline' => 2,
            ],
            [
                'pelica_amount' => 5,
                'repay_deadline' => 4,
            ],
            [
                'pelica_amount' => 10,
                'repay_deadline' => 7,
            ],
            [
                'pelica_amount' => 20,
                'repay_deadline' => 10,
            ],
            [
                'pelica_amount' => 50,
                'repay_deadline' => 30,
            ],
            [
                'pelica_amount' => 10,
                'repay_deadline' => 2,
            ],
        ];

        foreach ($loanOptions as $loanOption) {
            DB::table('loan_options')->insert($loanOption);
        }
    }
}
