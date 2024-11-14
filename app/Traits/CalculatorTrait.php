<?php

namespace App\Traits;

use App\Models\LoanProduct;
use App\Models\UserFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\File;

trait CalculatorTrait{

    use LoanTrait;
    public function calculateAmortizationSchedule($loanAmount, $loanTermYears, $loanProductId, $loan = null) {

        try {
            $info = $this->get_LoanProductDetails($loanProductId);

            switch ($info->interest_methods->first()->interest_method->name) {
                case 'Flat Rate':
                    return $this->flatRateAmortization($loanAmount, $loanTermYears, $info);
                    break;

                case 'Reducing Balance - Equal Principal':
                    return $this->calculateReducingBalanceEqualPrincipal($loanAmount, $loanTermYears, $info, $loan);
                break;

                case 'Reducing Balance - Equal Installments':
                    return $this->calculateReducingBalanceEqualInstallment($loanAmount, $loanTermYears, $info, $loan);
                break;

                case 'Interest-Only':
                    return $this->calculateInterestOnly($loanAmount, $loanTermYears, $info, $loan);
                    break;

                case 'Compound Interest':
                    return $this->calculateInterestOnly($loanAmount, $loanTermYears, $info, $loan);
                    break;
                default:
                # code...
                break;
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    function flatRateAmortization($principal, $termMonths, $info) {
            $schedule = [];
            $monthlyInterestRate = $info->def_loan_interest / 100 / 12;
            $monthlyPayment = ($principal * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$termMonths));

            $remainingBalance = $principal;

            for ($i = 0; $i < $termMonths; $i++) {
                $interest = $remainingBalance * $monthlyInterestRate;
                $principalPayment = $monthlyPayment - $interest;
                $remainingBalance -= $principalPayment;

                $schedule[] = [
                    'month' => $i + 1,
                    'payment' => $monthlyPayment,
                    'principal' => $principalPayment,
                    'interest' => $interest,
                    'balance' => $remainingBalance
                ];
            }
            return $schedule;
    }



    public function calculateEqualInstallment($principal, $termMonths, $info, $loan = null) {
        $schedule = [];

        // Determine the monthly interest rate based on loan interest or default interest
        $annualInterestRate = $loan && $loan->interest ? $loan->interest / 100 : $info->def_loan_interest / 100;
        $monthlyInterestRate = $annualInterestRate / 12;

        // Calculate monthly payment using the formula for equal installment amortization
        $monthlyPayment = ($principal * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$termMonths));

        $remainingBalance = $principal;

        for ($i = 0; $i < $termMonths; $i++) {
            // Calculate interest for the current month
            $interest = $remainingBalance * $monthlyInterestRate;

            // Calculate principal payment for the current month
            $principalPayment = $monthlyPayment - $interest;

            // Update remaining balance
            $remainingBalance -= $principalPayment;

            // Add installment details to the schedule
            $schedule[] = [
                'month' => $i + 1,
                'payment' => 'K' . number_format($monthlyPayment, 2),
                'principal' => 'K' . number_format($principalPayment, 2),
                'interest' => 'K' . number_format($interest, 2),
                'balance' => 'K' . number_format(max($remainingBalance, 0), 2), // Ensure non-negative balance
                'description' => $remainingBalance <= 0 ? 'Maturity' : 'Repayment',
            ];
        }

        // Calculate total principal and interest amounts
        $totalPrincipal = array_sum(array_column($schedule, 'principal'));
        $totalInterest = array_sum(array_column($schedule, 'interest'));

        // Add totals row
        $schedule[] = [
            'month' => 'Total',
            'payment' => number_format($totalPrincipal + $totalInterest, 2),
            'principal' => number_format($totalPrincipal, 2),
            'interest' => number_format($totalInterest, 2),
            'balance' => '',
            'description' => '',
        ];

        return $schedule;
    }


    public function calculateReducingBalanceEqualInstallment($principal, $termMonths, $info, $loan = null)
    {
        try {
            // Determine the annual interest rate based on loan-specific interest or a default
            $annualInterestRate = $loan && $loan->interest ? $loan->interest / 100 : $info->def_loan_interest / 100;
            $monthlyInterestRate = $annualInterestRate / 12;

            // Initialize amortization table
            $schedule = [];

            // Initialize loan balance
            $loan_balance = $principal;

            // Calculate monthly installment using reducing balance method
            $monthly_installment = ($principal * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$termMonths));

            // Loop through each installment to calculate details
            for ($i = 0; $i < $termMonths; $i++) {
                // Calculate interest for the current installment
                $interest = $loan_balance * $monthlyInterestRate;

                // Calculate principal for the current installment
                $principal_payment = $monthly_installment - $interest;

                // Update loan balance
                $loan_balance -= $principal_payment;

                // Add current installment's data to the schedule
                $schedule[] = [
                    'month' => $i + 1,
                    'payment' => $monthly_installment,
                    'principal' => number_format($principal_payment, 2),
                    'interest' => number_format($interest, 2),
                    'balance' => number_format(max($loan_balance, 0), 2), // Ensure non-negative balance
                ];
            }

            // Return the amortization schedule
            return $schedule;

        } catch (\Throwable $th) {
            // Handle exceptions
            // dd($th);
        }
    }


    public function calculateReducingBalanceEqualPrincipal($principal, $termMonths, $info, $loan = null)
    {
        try {
            // Determine the annual interest rate based on loan-specific interest or a default
            $annualInterestRate = $loan && $loan->interest ? $loan->interest / 100 : $info->def_loan_interest / 100;
            $monthlyInterestRate = $annualInterestRate / 12;

            // Initialize amortization schedule array
            $schedule = [];

            // Calculate the fixed principal repayment amount per month
            $principal_payment = $principal / $termMonths;

            // Initialize loan balance
            $loan_balance = $principal;

            // Loop through each installment to calculate details
            for ($i = 0; $i < $termMonths; $i++) {
                // Calculate interest for the current installment based on the remaining balance
                $interest = $loan_balance * $monthlyInterestRate;

                // Calculate total payment for the current month (principal + interest)
                $monthlyPayment = $principal_payment + $interest;

                // Update the remaining balance
                $loan_balance -= $principal_payment;

                // Add current installment's data to the schedule
                $schedule[] = [
                    'month' => $i + 1,
                    'payment' => $monthlyPayment,
                    'principal' => number_format($principal_payment, 2),
                    'interest' => number_format($interest, 2),
                    'balance' => number_format(max($loan_balance, 0), 2), // Ensure non-negative balance
                ];
            }

            // Return the amortization schedule
            return $schedule;

        } catch (\Throwable $th) {
            // Handle exceptions
            dd($th);
        }
    }

    public function calculateInterestOnly($principal, $termMonths, $info, $loan = null)
    {
        try {
            // Determine the annual interest rate based on loan-specific interest or a default
            $annualInterestRate = $loan && $loan->interest ? $loan->interest / 100 : $info->def_loan_interest / 100;
            $monthlyInterestRate = $annualInterestRate / 12;

            // Initialize amortization schedule array
            $schedule = [];

            // Initialize total amounts
            $totalInterest = 0;
            $totalDue = 0;

            // Loop through each installment to calculate details
            for ($i = 1; $i <= $termMonths; $i++) {
                // Calculate due date based on the release date
                $dueDate = Carbon::now()->addMonths($i);

                // Calculate interest for the current installment
                $interest = $principal * $monthlyInterestRate;

                // Set principal balance to 0 for all installments except the last one
                $principalBalance = ($i === $termMonths) ? $principal + $interest : 0.00;

                // Calculate total due amount for the current installment
                $dueAmount = $interest + $principalBalance;

                // Update total amounts
                $totalInterest += $interest;
                $totalDue += $dueAmount;

                // Add current installment's data to the schedule
                $schedule[] = [
                    'month' => $i,
                    'payment' => 'K' . number_format($dueAmount, 2),
                    'principal' => '0.00', // Principal is zero for interest-only loans
                    'interest' => 'K' . number_format($interest, 2),
                    'balance' => 'K' . number_format(max($principal - $principalBalance, 0), 2), // Balance after payment
                ];
            }

            // Return the amortization schedule
            return $schedule;

        } catch (\Throwable $th) {
            // Handle exceptions
            dd($th);
        }
    }

    public function calculateCompoundInterest($principal, $termMonths, $info, $loan = null)
    {
        try {
            // Determine the annual interest rate based on loan-specific interest or default interest
            $annualInterestRate = $loan && $loan->interest ? $loan->interest / 100 : $info->loan_interest_period / 100;
            $monthlyInterestRate = $annualInterestRate / 12;

            // Initialize amortization table
            $schedule = [];

            // Initialize loan balance and total interest
            $loanBalance = $principal;
            $totalInterest = 0;

            // Parse release date and calculate maturity date
            $releaseDate = Carbon::parse($info->release_date);
            $maturityDate = $releaseDate->copy()->addMonths($termMonths);

            // Add loan details to the amortization table
            $schedule[] = [
                'released' => $releaseDate->format('d/m/Y'),
                'maturity' => $maturityDate->format('d/m/Y'),
                'repayment_frequency' => $info->loan_repayment_cycle ?? 'monthly', // Use info's repayment cycle or default
                'principal' => number_format($principal, 2),
                'interest' => '0.00',
                'fees' => '0.00',
                'due' => '0.00',
            ];

            // Loop through each period to calculate interest, principal, and remaining balance
            for ($i = 1; $i <= $termMonths; $i++) {
                $dueDate = $releaseDate->copy()->addMonths($i);

                // Calculate principal payment for the current period
                $principalPayment = ($i === $termMonths) ? $loanBalance : $principal;

                // Calculate interest for the current period
                $interest = $loanBalance * $monthlyInterestRate;

                // Update total interest
                $totalInterest += $interest;

                // Update loan balance (principal + accumulated interest)
                $loanBalance += $interest;
                $loanBalance -= $principalPayment;

                // Add current period's data to the amortization table
                $schedule[] = [
                    'due_date' => $dueDate->format('d/m/Y'),
                    'principal' => number_format($principalPayment, 2),
                    'interest' => number_format($interest, 2),
                    'fees' => '0.00',
                    'penalty' => '0.00',
                    'due' => number_format($interest + $principalPayment, 2),
                    'principal_balance' => number_format($loanBalance, 2),
                    'description' => ($i === $termMonths) ? 'Maturity' : 'Repayment',
                ];
            }

            // Calculate total due amount
            $totalDue = $principal + $totalInterest;

            // Add total row to amortization table
            $schedule[] = [
                'due_date' => 'Total',
                'principal' => number_format($principal, 2),
                'interest' => number_format($totalInterest, 2),
                'fees' => '0.00',
                'penalty' => '0.00',
                'due' => number_format($totalDue, 2),
                'principal_balance' => '', // Leave blank for totals row
                'description' => '', // Leave blank for totals row
            ];

            // Return the complete amortization schedule
            return $schedule;

        } catch (\Exception $e) {
            // Log the error and rethrow for further handling
            Log::error('Error calculating compound interest: ' . $e->getMessage());
            throw $e;
        }
    }


    // Getters
    public function get_LoanProductDetails($id){
        return LoanProduct::where('id', $id)->with([
            'disbursed_by.disbursed_by',
            'interest_methods.interest_method',
            'interest_types.interest_type',
            'loan_accounts.account_payment',
            'loan_status.status',
            'loan_decimal_places',
            'service_fees.service_charge',
            'loan_institutes.institutions'
        ])->first();
    }
}


