<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Traits\LoanTrait;
use App\Traits\UserTrait;
use Livewire\Component;

class NewLoanView extends Component
{
    use UserTrait, LoanTrait;
    public function render()
    {
        // Check OTP
        $this->VerifyOTP();
        return view('livewire.dashboard.loans.new-loan-view')
        ->layout('layouts.dashboard');
    }
}
