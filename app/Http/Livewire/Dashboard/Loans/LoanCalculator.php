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
use Carbon\Carbon;



class LoanCalculator extends Component
{
    use LoanTrait;

    public $principal;
    public $release_date;
    public $loan_interest_method = 'Flat Rate';
    public $loan_interest_type = 1;
    public $loan_interest_value;
    public $loan_interest_period;
    public $loan_duration_period;
    public $minimum_num_of_repayments = 1;
    public $loan_duration_value = 1;
    public $loan_repayment_cycle = 'Daily';
    public $amortization_table_flat_rate;
    public $total_repayment_amount_flat_rate;

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
    try {
        // dd($this->loan_interest_method);
        switch ($this->loan_interest_method) {
            case 'Flat Rate':
                // Perform calculation for flat rate interest
                // You can define a separate method for this calculation
                $this->calculateFlatRate();
                break;
            case 'Reducing Balance - Equal Instalments':
                // Perform calculation for reducing balance with equal installment interest
                // You can define a separate method for this calculation
                $this->calculateReducingBalanceEqualInstallment();
                break;
            case 'Reducing Balance - Equal Principal':
                // Perform calculation for reducing balance with equal principal interest
                // You can define a separate method for this calculation
                $this->calculateReducingBalanceEqualPrincipal();
                break;
            case 'Interest Only':
                // Perform calculation for interest only interest
                // You can define a separate method for this calculation
                $this->calculateInterestOnly();
                break;
            case 'Compound Interest':
                // Perform calculation for compound interest
                // You can define a separate method for this calculation
                $this->calculateCompoundInterest();
                break;
            default:
                // Handle other cases or show an error message
                break;
        }
    } catch (\Throwable $th) {
        dd($th);
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

    // Get the release date and convert it to a Carbon instance
    $release_date = Carbon::parse($this->release_date);

    // Calculate the number of rows based on the minimum number of repayments
    $num_rows = max(1, $this->minimum_num_of_repayments);

    // Loop through each period and calculate interest, principal, and remaining balance
    for ($i = 1; $i <= $num_rows; $i++) {
        // Calculate due date based on the release date
        $due_date = $release_date->addDays(7 * $i); // Assuming weekly payments

        // Calculate interest for the current period
        $interest = $loan_balance * $monthly_interest_rate;

        // Calculate principal for the current period
        $principal = $monthly_installment - $interest;

        // Update loan balance
        $loan_balance -= $principal;

        // Add current period's data to amortization table
        $amortization_table[] = [
            'period' => $i,
            'due_date' => $due_date->format('d/m/Y'),
            'principal_amount' => number_format($this->principal / $this->minimum_num_of_repayments, 2),
            'interest_amount' => number_format($interest, 2),
            'fee_amount' => '0',
            'penalty_amount' => '0',
            'due_amount' => number_format($monthly_installment, 2),
            'principal_balance' => number_format($loan_balance, 2),
            'description' => ($loan_balance <= 0) ? 'Maturity' : 'Repayment',
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

