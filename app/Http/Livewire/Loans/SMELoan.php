<?php

namespace App\Http\Livewire\Loans;

use Livewire\Component;
use App\Traits\EmailTrait;

class SMELoan extends Component
{
    use EmailTrait;
    public $name, $email, $phone, $state;
    public $type = 'Agri Business';
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'phone' => 'required|min:10',
        'state' => 'required'
    ];

    public function render()
    {
        return view('livewire.loans.offer');
    }

    public function sendRequest(){
        $this->validate();
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'state' => $this->state,
            'type' => $this->type,
        ];

        $resp = $this->send_loan_enquiry($data);
        if($resp == null){
            session()->flash('message', 'Email sent successfully.');
        }else{
            session()->flash('message', 'There was something wrong. Message Failed');
        }
    }
}
