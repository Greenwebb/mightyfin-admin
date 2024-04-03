<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LoanNotification;
use App\Models\Application;
use Illuminate\Http\Request;

class LoanNotificationController extends Controller
{
    public function plpNotification(Request $request){
        try {
            LoanNotification::create([
                'application_id' => $request->input('application_id'),
                'user_id' => $request->input('user_id'), //Borrower
                'notification_type' => 'PLP',
                'message' => 'Your request loan amount is more than the PLP, you might need to increase the number of months for
                the loan and also reduce the request loan amount being requested.',
                'is_accepted' => 0,
                'status' => 1 //sent
            ]);
            Application::where('id', $request->input('application_id'))->update([
                'plp_sent' => 1
            ]);

            //Send SMS
            return response()->json(['resp' => true]);
        } catch (\Throwable $th) {
            return response()->json(['resp' => false]);
        }
    }
}
