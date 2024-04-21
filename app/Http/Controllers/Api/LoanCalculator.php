<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\LoanProduct;

class LoanCalculator extends Controller
{
    public function calculateReducingBalanceEqualInstallment(Request $request)
    {
        try {
            // Convert loan duration to months if it's not already in months
            switch ($request->loan_duration_period) {
                case 'day':
                    $loan_term = $request->loan_duration_value / 30; // Assuming 30 days per month
                    break;
                case 'week':
                    $loan_term = $request->loan_duration_value * 4; // Assuming 4 weeks per month
                    break;
                case 'year':
                    $loan_term = $request->loan_duration_value * 12; // 12 months in a year
                    break;
                default:
                    $loan_term = $request->loan_duration_value;
                    break;
            }

            $release_date = Carbon::parse($request->release_date);
            $monthly_interest_rate = $request->loan_interest_value / 100;
            $monthly_installment = ($request->principal * $monthly_interest_rate) / (1 - pow(1 + $monthly_interest_rate, -$loan_term));
            $loan_balance = $request->principal;

            $total_principal = 0;
            $total_interest = 0;
            $total_due = 0;

            $amortization_table = ['installments' => []];

            for ($i = 1; $i <= $request->minimum_num_of_repayments; $i++) {
                $due_date = $release_date->copy()->addMonths($i);
                $interest = $loan_balance * $monthly_interest_rate;
                $principal = $monthly_installment - $interest;
                $loan_balance -= $principal;

                $total_principal += $principal;
                $total_interest += $interest;
                $total_due += $monthly_installment;

                $amortization_table['installments'][] = [
                    'due_date' => $due_date->format('d/m/Y'),
                    'principal' => number_format($principal, 2),
                    'interest' => number_format($interest, 2),
                    'fee_amount' => '0',
                    'penalty' => '0',
                    'due' => number_format($monthly_installment, 2),
                    'principal_balance' => number_format($loan_balance, 2),
                    'description' => ($loan_balance <= 0) ? 'Maturity' : 'Repayment',
                ];
            }

            // Add totals to the response
            $totals = [
                'total_principal' => number_format($total_principal, 2),
                'total_interest' => number_format($total_interest, 2),
                'total_due' => number_format($total_due, 2)
            ];

            return response()->json([
                'amortization_table' => $amortization_table,
                'totals' => $totals
            ]);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}

