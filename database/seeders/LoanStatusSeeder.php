<?php

namespace Database\Seeders;

use App\Models\LoanStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 4; $i++) { 
            LoanStatus::create(
                [
                    'loan_product_id' => 1,
                    'status_id' => $i,
                    'stage' => 'processing',
                    'step' => $i + 1,
                ]
            );
        }

        for ($i=0; $i < 5; $i++) { 
            LoanStatus::create(
                [
                    'loan_product_id' => 1,
                    'status_id' => $i,
                    'stage' => 'open',
                    'step' => $i + 1,
                ]
            );
        }

        for ($i=0; $i < 9; $i++) { 
            LoanStatus::create(
                [
                    'loan_product_id' => 1,
                    'status_id' => $i,
                    'stage' => 'defaulted',
                    'step' => $i + 1,
                ]
            );
        }

        for ($i=0; $i < 6; $i++) { 
            LoanStatus::create(
                [
                    'loan_product_id' => 1,
                    'status_id' => $i,
                    'stage' => 'denied',
                    'step' => $i + 1,
                ]
            );
        }

        for ($i=0; $i < 4; $i++) { 
            LoanStatus::create(
                [
                    'loan_product_id' => 1,
                    'status_id' => $i,
                    'stage' => 'Not Taken Up',
                    'step' => $i + 1,
                ]
            );
        }
    }
}
