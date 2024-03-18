<?php

namespace App\Traits;

use App\Models\LoanProduct;
use App\Models\UserFile;
use Illuminate\Support\File;
trait CalculatorTrait{

    function calculateAmortizationSchedule($loanAmount, $annualInterestRate, $loanTermYears) {
        $monthlyInterestRate = $annualInterestRate / 12 / 100;
        $totalPayments = $loanTermYears * 12;
        $monthlyPayment = ($loanAmount * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$totalPayments));
        
        $amortizationSchedule = [];
        $balance = $loanAmount;
        for ($i = 1; $i <= $totalPayments; $i++) {
            $interestPayment = $balance * $monthlyInterestRate;
            $principalPayment = $monthlyPayment - $interestPayment;
            $balance -= $principalPayment;
            
            $amortizationSchedule[] = [
                'month' => $i,
                'payment' => $monthlyPayment,
                'interest' => $interestPayment,
                'principal' => $principalPayment,
                'balance' => $balance
            ];
        }
        
        return $amortizationSchedule;
    }
    public function getLoanProductDetails($id){
        
    }

    
        
    // // Example usage:
    // $loanAmount = 100000; // Loan amount
    // $annualInterestRate = 5; // Annual interest rate (in percentage)
    // $loanTermYears = 30; // Loan term in years
    
    // $amortizationSchedule = calculateAmortizationSchedule($loanAmount, $annualInterestRate, $loanTermYears);
    
    // // Print the amortization schedule
    // echo "Month | Payment | Interest | Principal | Balance\n";
    // foreach ($amortizationSchedule as $payment) {
    //     printf("%5d | %8.2f | %8.2f | %9.2f | %8.2f\n", $payment['month'], $payment['payment'], $payment['interest'], $payment['principal'], $payment['balance']);
    // }

}