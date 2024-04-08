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
    public $loan_interest_value = 0;
    public $loan_interest_period;
    public $loan_duration_period;
    public $minimum_num_of_repayments = 1;
    public $loan_repayment_cycle = [];

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
        
    // Method to increase the loan interest value
    public function increaseInterestValue()
    {
        $this->loan_interest_value++;
    }

    // Method to decrease the loan interest value
    public function decreaseInterestValue()
    {
        $this->loan_interest_value--;
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
}

