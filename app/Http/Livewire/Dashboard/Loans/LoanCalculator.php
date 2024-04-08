<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;
use App\Traits\LoanTrait;
use App\Models\InterestMethod;
use App\Models\InterestType;
use App\Models\DisbursedBy;
use App\Models\RepaymentCycle;
use App\Models\RepaymentOrder;
use App\Models\AccountPayment;
use App\Models\ServiceCharge;
use App\Models\Institution;
use App\Models\CrbProduct;

class LoanCalculator extends Component
{
    use LoanTrait;

    public $principal;
    public $release_date;
    public $loan_interest_method;
    public $loan_interest_type;
    public $loan_interest_value;
    public $loan_interest_period;
    public $loan_duration_period;
    public $minimum_num_of_repayments = 1;
    public $loan_duration_value = 1;
    public $loan_repayment_cycle;

    // Declare public properties for the models
    public $interest_methods;
    public $interest_types;
    public $repayment_cycles;

    public function render()
    {
        // Retrieve data from models and assign to public properties
        $this->interest_methods = InterestMethod::get();
        $this->interest_types = InterestType::get();
        $this->repayment_cycles = RepaymentCycle::get();

        return view('livewire.dashboard.loans.loan-calculator')->layout('layouts.admin');
    }

    public function convertTime()
{

    // dd($this->loan_duration_period); 
    switch ($this->loan_duration_period) {
        case 'day':
            switch ($this->loan_repayment_cycle) {
                case 'Daily':
                    $this->minimum_num_of_repayments = $this->loan_duration_value;
                break;
                // case 'Weekly':
                //     $this->minimum_num_of_repayments = $this->loan_duration_value / 7;
                //     break;
                case 'BiWeekly':
                    // Calculate minimum number of repayments for bi-weekly cycle
                break;
                case 'Monthly':
                    // Calculate minimum number of repayments for monthly cycle
                break;
                default:
                    // $this->minimum_num_of_repayments = $this->loan_duration_value;
                break;
            }
            break;
            case 'week':
                switch ($this->loan_repayment_cycle) {
                    case 'Daily':
                        // dd($this->loan_duration_value);
                        // Convert weekly duration to days
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 7;
                    break;
                    case 'Weekly':
                        $this->minimum_num_of_repayments = $this->loan_duration_value;
                    break;
                    case 'BiWeekly':
                        // Calculate minimum number of repayments for bi-weekly cycle
                    break;
                    case 'Monthly':
                        // Calculate minimum number of repayments for monthly cycle
                    break;
                    default:
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 7;
                    break;
                }
            break;
            case 'month':
                switch ($this->loan_repayment_cycle) {
                    case 'Daily':
                        // Convert monthly duration to days
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 30;
                        break;
                    case 'Weekly':
                        // Convert monthly duration to weeks
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 4;
                        break;
                    case 'BiWeekly':
                        // Convert monthly duration to bi-weeks
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 2;
                        break;
                    case 'Monthly':
                        // Minimum number of repayments is equal to the loan duration value
                        $this->minimum_num_of_repayments = $this->loan_duration_value;
                        break;
                    default:
                        // Default conversion to days
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 30;
                        break;
                }
            break;
            
        default:
            // Handle default case
            break;
    }
}

        
    // Method to increase the loan interest value
    public function increaseDurationValue()
    {
        $this->loan_duration_value++;
        $this->increaseRepayments();
        $this->convertTime();

    }

    // Method to decrease the loan interest value
    public function decreaseDurationValue()
    {
        $this->loan_duration_value--;
        $this->decreaseRepayments();
        $this->convertTime();
    }

    // Method to increase the minimum number of repayments
    public function increaseRepayments()
    {
        $this->minimum_num_of_repayments++;
    }
    
    // Method to decrease the minimum number of repayments
    public function decreaseRepayments()
    {
        $this->minimum_num_of_repayments--;
    }



    // Add this method to your Livewire component

public function calculateLoan()
{
    switch ($this->loan_interest_method) {
        case 'flat_rate':
            // Perform calculation for flat rate interest
            // You can define a separate method for this calculation
            $this->calculateFlatRate();
            break;
        case 'reducing_balance_equal_installment':
            // Perform calculation for reducing balance with equal installment interest
            // You can define a separate method for this calculation
            $this->calculateReducingBalanceEqualInstallment();
            break;
        case 'reducing_balance_equal_principal':
            // Perform calculation for reducing balance with equal principal interest
            // You can define a separate method for this calculation
            $this->calculateReducingBalanceEqualPrincipal();
            break;
        case 'interest_only':
            // Perform calculation for interest only interest
            // You can define a separate method for this calculation
            $this->calculateInterestOnly();
            break;
        case 'compound_interest':
            // Perform calculation for compound interest
            // You can define a separate method for this calculation
            $this->calculateCompoundInterest();
            break;
        default:
            // Handle other cases or show an error message
            break;
    }
}

// Define separate methods for each interest calculation if needed

private function calculateFlatRate()
{
    // Convert loan duration to months if it's not already in months
    switch ($this->loan_duration_period) {
        case 'day':
            $loan_term = $this->loan_duration_value / 30; // Assuming 30 days per month
            break;
        case 'week':
            $loan_term = $this->loan_duration_value * 4; // Assuming 4 weeks per month
            break;
        case 'year':
            $loan_term = $this->loan_duration_value * 12; // 12 months in a year
            break;
        default:
            $loan_term = $this->loan_duration_value;
            break;
    }

    // Initialize amortization table
    $amortization_table = [];

    // Initialize loan balance
    $loan_balance = $this->principal;

    // Calculate monthly interest rate
    $monthly_interest_rate = $this->loan_interest_value / 100 / 12;

    // Calculate monthly installment
    $monthly_installment = $loan_balance * $monthly_interest_rate / (1 - pow(1 + $monthly_interest_rate, -$loan_term));

    // Loop through each period and calculate interest, principal, and remaining balance
    for ($i = 1; $i <= $loan_term; $i++) {
        // Calculate interest for the current period
        $interest = $loan_balance * $monthly_interest_rate;

        // Calculate principal for the current period
        $principal = $monthly_installment - $interest;

        // Update loan balance
        $loan_balance -= $principal;

        // Add current period's data to amortization table
        $amortization_table[] = [
            'period' => $i,
            'payment' => $monthly_installment,
            'principal' => $principal,
            'interest' => $interest,
            'balance' => $loan_balance,
        ];
    }

    // Store amortization table in a public property for wire model bindings
    $this->amortization_table_flat_rate = $amortization_table;

    // Store total repayment amount in a public property
    $this->total_repayment_amount_flat_rate = $monthly_installment * $loan_term;
}


private function calculateReducingBalanceEqualInstallment()
{
    // Implement reducing balance with equal installment calculation logic
}

private function calculateReducingBalanceEqualPrincipal()
{
    // Implement reducing balance with equal principal calculation logic
}

private function calculateInterestOnly()
{
    // Implement interest only calculation logic
}

private function calculateCompoundInterest()
{
    // Implement compound interest calculation logic
}

}

