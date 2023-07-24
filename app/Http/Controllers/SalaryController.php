<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Bankdetail;
use App\Models\Department;
use App\Models\Bank;
use App\Models\Salary;
use App\Models\Appraisal;
use App\Models\Salaryslip;
use Carbon\Carbon;

class SalaryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function all(Request $request){

        if($request->isMethod('POST')){
            $salaryMonth = $request->input('salaryMonth');

            // $data['allEmployeeSalary'] = Salaryslip::where('forTheMonth', '=', $salaryMonth)->get();
            // $date = date('m/Y', strtotime($salaryMonth));
            // dd($date);
            // dd($request->input(''))
           
            // $search_month = Carbon::createFromFormat('M Y', $request->input('salaryMonth'))->format('m/Y');
            // dd($search_month);
            
            $allEmployeeSalary = Salaryslip::where('is_deleted', '!=', 1)->get();
           
            
            $employeeSalary = [];
            foreach ($allEmployeeSalary as $key => $EmployeeSalary) {
                # code...
                // dd($EmployeeSalary, $key, Department::where('eID', $EmployeeSalary['eID'])->get('ctc'));

                // $currentMonth = explode('/',$EmployeeSalary->forTheMonth); 
                // $current_salary_month = $currentMonth[0].'/'.$currentMonth[2];
                // dd($current_salary_month,$search_month );

                if($EmployeeSalary->forTheMonth == $salaryMonth){
                    $currentEmployee = Department::where('eID', $EmployeeSalary['eID'])->first();
                    // dd($EmployeeSalary['eID']);
                    $EmployeeSalary['ctc'] = $currentEmployee->ctc;
                    array_push($employeeSalary, $EmployeeSalary);
                }
                
            }
            // dd($allEmployeeSalary, $employeeSalary);
            $data['allEmployeeSalary'] = $employeeSalary;
            // dd($data['allEmployeeSalary']);
            return $data;
        }
        return view('salary.salary');
    }

    public function update(Request $request, $id){

        // $data['salary'] = Department::join('paid_salary', 'paid_salary.eID', '=', 'departments.eID')
        //                     ->where('paid_salary.id', '=', $id)
        //                     ->first();
        // // dd($id, $data['salary']);

        // $data['salary'] = Salaryslip::join('departments','departments.eID','=','paid_salary.eID')->where('paid_salary.id','=',$id)->first();

        // $data['salary'] = Salaryslip::with('department')->where('paid_salary.id','=',$id)->first();
        // echo gettype($data['salary']);
        // exit;
        // dd($data['salary']->getRelations()['department']->ctc);
        // $data['salary']->ctc = $data['salary']->getRelations()['department']->ctc;

        $data['salary'] = Salaryslip::where('id','=',$id)->where('is_deleted','=','0')->first();

        $data['ctc'] = Department::select('ctc')->where('eID','=',$data['salary']->eID)->first();
        // dd($data['ctc']);

        return view('salary.update', $data);

    }

    public function delete(Request $request, $id){
        
        $update_data = [
            "is_deleted" => 1
        ];

        $DeleteSalarySlip = Salaryslip::where('id', $id)->update($update_data);
        
        if($DeleteSalarySlip == 1){
            $data['status'] = 'success';
            $data['message'] = 'Salaryslip deleted successfully';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Error in deleting salaryslip';
        }
        
        return $data;

    }

    // public function all(Request $request){

    //     if($request->isMethod('POST')){
    //         $salaryMonth = $request->input('salaryMonth');
    //         // $data['allEmployeeSalary'] = Salaryslip::where('forTheMonth', '=', $salaryMonth)->get();
    //         // $date = date('m/Y', strtotime($salaryMonth));
    //         // dd($date);
    //         // dd($request->input(''))
           
    //         $search_month = Carbon::createFromFormat('M Y', $request->input('salaryMonth'))->format('m');
    //         dd($search_month);
            
    //         $allEmployeeSalary = Salaryslip::where('forTheMonth','=',$search_month)->where('is_deleted', '!=', 1)->get();
    //         // dd($allEmployeeSalary);
            
    //         $employeeSalary = [];
    //         foreach ($allEmployeeSalary as $key => $EmployeeSalary) {
    //             # code...
    //             // dd($EmployeeSalary, $key, Department::where('eID', $EmployeeSalary['eID'])->get('ctc'));
    //             $currentEmployee = Department::where('eID', $EmployeeSalary['eID'])->first();
    //             $EmployeeSalary['ctc'] = $currentEmployee->ctc;
    //             array_push($employeeSalary, $EmployeeSalary);
    //         }
    //         // dd($allEmployeeSalary, $employeeSalary);
    //         $data['allEmployeeSalary'] = $employeeSalary;
    //         // dd($data['allEmployeeSalary']);
    //         return $data;
    //     }
    //     return view('salary.salary');
    // }
}
