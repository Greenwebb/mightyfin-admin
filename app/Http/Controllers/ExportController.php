<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;
class ExportController extends Controller
{
    public function export_loans(Request $request){
        $fromDate = Carbon::parse($request->input('from_date'))->startOfDay();
        $toDate = Carbon::parse($request->input('to'))->endOfDay();
    
        $applications = Application::with(['loan' => function ($query) use ($fromDate, $toDate) {
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }])->get();
        
        
        $headers = [
            'Loan ID', 'Loan Type', 'Principal', 'Duration', 'Date', 'Borrower', 'Payback', 'Status'
        ];

    
        // Create a new Spreadsheet instance
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Add headers to the sheet
        $sheet->fromArray([$headers], NULL, 'A1');
    
        // Add data to the sheet
        $data = [];
        
        foreach ($applications as $app) {
            
            $data[] = [
                $app->id,
                $app->loan_product->name,
                number_format($app->amount, 2, '.', ','),
                $app->repayment_plan,
                $app->created_at,
                $app->user->fname.' '. $app->user->lname,
                number_format(Application::payback($app->amount, $app->repayment_plan), 2, '.', ','),
                $app->status
            ];
        }

        // dd($data);
        $sheet->fromArray($data, NULL, 'A2');
    
        // Save the Excel file
        $fileName = 'Loan Applications.xlsx';
        $writer = new Xlsx($spreadsheet);
    
        // Stream the file to the browser
        ob_start();
        $writer->save('php://output');
        $content = ob_get_clean();
    
        return response($content)
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->header('Content-Disposition', 'attachment;filename="' . $fileName . '"')
            ->header('Cache-Control', 'max-age=0');
    }



    public function export_users(Request $request){
        // $fromDate = Carbon::parse($request->input('from_date'))->startOfDay();
        // $toDate = Carbon::parse($request->input('to'))->endOfDay();
    
        // $applications = Application::with(['loan' => function ($query) use ($fromDate, $toDate) {
        //     $query->whereBetween('created_at', [$fromDate, $toDate]);
        // }])->get();    
        $users = User::role('user')->orderBy('created_at', 'desc')->get();
        $headers = [
            'First Name', 'Last Name', 'Email', 'Phone', 'DOB', 'NRC Type', 'NRC No', 'Job Title', 'Address', 'Gender', 'Employee Number', 'Signed Up'
        ];

    
        // Create a new Spreadsheet instance
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Add headers to the sheet
        $sheet->fromArray([$headers], NULL, 'A1');
    
        // Add data to the sheet
        $data = [];
        
        foreach ($users as $user) {
            
            $data[] = [
                $user->fname,
                $user->lname,
                $user->email,
                $user->phone,
                $user->dob,
                $user->id_type,
                $user->nrc_no ?? $user->nrc,
                $user->jobTitle,
                $user->address,
                $user->gender,
                $user->employeeNo,
                $user->created_at

            ];
        }

        // dd($data);
        $sheet->fromArray($data, NULL, 'A2');
    
        // Save the Excel file
        $fileName = 'Customers.xlsx';
        $writer = new Xlsx($spreadsheet);
    
        // Stream the file to the browser
        ob_start();
        $writer->save('php://output');
        $content = ob_get_clean();
    
        return response($content)
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->header('Content-Disposition', 'attachment;filename="' . $fileName . '"')
            ->header('Cache-Control', 'max-age=0');
    }
}
