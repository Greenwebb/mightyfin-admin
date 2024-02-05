<?php

namespace App\Http\Controllers;

use App\Models\LoanStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoanProductController extends Controller
{
    
    public function updateLoanStatus(Request $request){
        try {
            $data = $request->toArray();
            // dd($data);
            // Processing
            foreach (($data['processing']) as $key => $value) {
                
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'processing',
                        'step' => $key + 1,
                        'state' => $key == 0 ? 'current':'pending',
                    ]
                );
            }
            // Open
            foreach (($data['open']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'open',
                        'step' => $key + 1,
                    ]
                );
            }
    
            // Defaulted
            foreach (($data['defaulted']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'defaulted',
                        'step' => $key + 1,
                    ]
                );
            }
    
            // Denied
            foreach (($data['denied']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'denied',
                        'step' => $key + 1,
                    ]
                );
            }
    
            // Not Taken Up
            foreach (($data['not_taken_up']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'Not Taken Up',
                        'step' => $key + 1,
                    ]
                );
            }
            
            Session::flash('success', "Loan statuses created successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-types']);
        } catch (\Throwable $th) {
            Session::flash('error', "Failed. ". $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-types']);
        }
    }
}
