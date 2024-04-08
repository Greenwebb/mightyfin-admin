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

    // Declare public properties for the models
    public $interest_methods;
    public $interest_types;
    public $disbursements;
    public $repayment_cycles;
    public $repayment_orders;
    public $company_accounts;
    public $service_charges;
    public $institutions;
    public $crb_products;

    public function render()
    {
        // Retrieve data from models and assign to public properties
        $this->interest_methods = InterestMethod::get();
        $this->interest_types = InterestType::get();
        $this->disbursements = DisbursedBy::get();
        $this->repayment_cycles = RepaymentCycle::get();
        $this->repayment_orders = RepaymentOrder::get();
        $this->company_accounts = AccountPayment::get();
        $this->service_charges = ServiceCharge::get();
        $this->institutions = Institution::where('status', 1)->get();
        $this->crb_products = CrbProduct::get();

        return view('livewire.dashboard.loans.loan-calculator')->layout('layouts.admin');
    }
}

