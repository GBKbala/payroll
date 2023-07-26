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
use App\Models\User;
use App\Models\Attendance;
use App\Models\Freelancer;
use crypt;
use Session;
use Carbon\Carbon;
use DB;

class EmployeeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        if(Session::get('isAdmin') == 1){
            $data['all_employee'] = '3';
            $data['all_developers'] = '1';
            $data['all_testers'] = '1';
            $data['all_hrs'] = '1';
        } else {
            $salarySlip = Salaryslip::where('eID', '=', Session::get('eID'))->where('is_deleted', '!=', 1)->get();
            $data['salaries'] = count($salarySlip) > 0 ? $salarySlip : [] ;
        }
        // dd($data, Session::all());
        return view('index',$data);
    }

    public function all(){
        // $data['employees'] = Employee::join('bankdetails', 'bankdetails.eID', '=', 'employees.eID')
        //                         ->join('departments', 'departments.eID', '=', 'employees.eID')
        //                         ->where('employees.isDeleted', '=', 'no')
        //                         ->get();
        // // foreach($data['employees'] as $employee){
        // //     $employee->department = $this->department($employee->department);
        // //     $employee->designation = $this->designation($employee->designation);
        // // }
       
        $data['employees'] =  Employee::with('bankdetail','department')->where('employees.isDeleted','=','no')->whereNull('employees.dateOfRelieving')->orderBy('employees.id','desc')->get();

        return view('employee.employee', $data);
    }

    public function employeeHistory(){
        $data['employees'] = Employee::with('bankdetail','department')->where('employees.isDeleted','=','no')->get();
        return view('employee.history', $data);
    }

    public function create(Request $request){
        if($request->isMethod('POST')){
            // dd($request->all());
            $name = $request->input('name');
            $dob = $request->input('dob');
            $eID =  $request->input('eID');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $bloodgroup = $request->input('bloodgroup');
            $address = $request->input('address');
            $bankName = $request->input('bankName');
            $branch = $request->input('branch');
            $ifscCode = $request->input('ifscCode');
            $accountNumber = $request->input('accountNumber');
            $eID = $request->input('eID');
            $officeEmail = $request->input('officeEmail');
            $department = $request->input('department');
            $designation = $request->input('designation');
            $dateOfJoining = $request->input('dateOfJoining');
            $ctc =str_replace(',','',$request->input('ctc')) ;
            $PBorOA = str_replace(',','',$request->input('PBorOA'));
            $employeeType = $request->input('employeeType');
            $company = $request->input('company');

            $exist = false;
            // $employees = Employee::join('departments', 'departments.eID', '=', 'employees.eID')
            //             ->join('bankdetails', 'bankdetails.eID', '=', 'employees.eID')
            //             ->where('employees.isDeleted', '=', 'no')
            //             ->get();

            $employees = Employee::with('bankdetail','department')->where('employees.isDeleted','=','no')->get();

            foreach($employees as $employee){
                if($employee->email == $email){
                    $data['status'] = 'error';
                    $data['message'] = 'Email already exists';
                    $exist = true;
                    continue;
                }

                // if($employee->accountNumber == $accountNumber){
                //     $data['status'] = 'error';
                //     $data['message'] = 'Account number already exists';
                //     $exist = true;
                //     continue;
                // }

                if($employee->eID == $eID){
                    $data['status'] = 'error';
                    $data['message'] = 'Employee ID already exists';
                    $exist = true;
                    continue;
                }

                // if($employee->officeEmail == $officeEmail){
                //     $data['status'] = 'error';
                //     $data['message'] = 'Office Email already exists';
                //     $exist = true;
                //     continue;
                // }
            }

            if($exist == false){

                // Add employees personal in employee table
                $employee = Employee::create([
                    // 'eID' => $eID,
                    'name' => $name,
                    'eID' =>$eID,
                    'dob' => $dob,
                    'email' => $email,
                    'phone' => $phone,
                    'bloodgroup' => $bloodgroup,
                    'address' => $address,
                    'employeeLogin' => 0,
                    'employeeType'=> $employeeType,
                    'company' => $company
                ]);

                // Add employees bankdetails in bankdetails table
                $bankdetail = BankDetail::create([
                    // 'id' => $employee->id,
                    'eID' => $eID,
                    'employee_id' => $employee->id,
                    'bankName' => $bankName,
                    'branch' => $branch,
                    'ifscCode' => $ifscCode,
                    'accountNumber' => $accountNumber
                ]);


                // Add employees in Department table
                $department = Department::create([
                    // 'id' =>  $employee->id,
                    'eID' => $eID,
                    'employee_id' => $employee->id,
                    'officeEmail' => $officeEmail,
                    'department' => $department,
                    'designation' => $designation,
                    'dateOfJoining' => $dateOfJoining,
                    'ctc' => $ctc,
                    'perfomance_bonus' => $PBorOA
                ]);

                // Add employees salary in salary_details table
                $salary_details = Salary::create([
                    'eID' => $employee->id,
                    'name' => $name,
                    'current_salary' => $ctc
                ]);

                if($employee->id && $bankdetail->id && $department->id && $salary_details->id){
                    $data['status'] = 'success';
                    $data['message'] = 'Employee created successfully';
                } else {
                    $data['status'] = 'error';
                    $data['message'] = 'Unable to create employee';
                }
            }

            return $data;
        }

        // $maxFreelancer = Freelancer::where('isDeleted','no')->max('eID');
        // $maxEmployee = Employee::where('isDeleted','no')->max('eID');
      
        // if($maxFreelancer > $maxEmployee ){
        //     $max_eID = $maxFreelancer;
        // }else{
        //     $max_eID = $maxEmployee;
        // }

        // $data['last_eID'] = $max_eID;

        $all_employee = Employee::orderBY('eID', 'DESC')->get();
        $eID = [];

        foreach($all_employee as $employee){
            array_push($eID, $employee->eID);
        }
        if(!empty($eID)){
            $data['last_eID'] = max($eID);
        } else {
            $data['last_eID'] = '0';
        }

        return view('employee.create',$data);
    }

    public function update(Request $request, $id){
        $data = [];


        if($request->isMethod('POST')){


            $exist = false;

            // $employees = Employee::join('departments', 'departments.eID', '=', 'employees.eID')
            //             ->join('bankdetails', 'bankdetails.eID', '=', 'employees.eID')
            //             ->where('employees.isDeleted', '=', 'no')
            //             ->where('employees.eID', '!=', $id)
            //             ->get();

            $employees = Employee::with('bankdetail','department')->where('employees.isDeleted','=','no')->where('employees.id','!=',$id)->get();
           
            foreach($employees as $employee){

                if($employee->email == $request->input('email')){
                    $data['status'] = 'error';
                    $data['message'] = 'Email already exists';
                    $exist = true;
                    continue;
                }

                // if($employee->accountNumber == $request->input('accountNumber')){
                //     $data['status'] = 'error';
                //     $data['message'] = 'Account number already exists';
                //     $exist = true;
                //     continue;
                // }

                // if($employee->eID == $request->input('eID')){
                //     $data['status'] = 'error';
                //     $data['message'] = 'Employee ID already exists';
                //     $exist = true;
                //     continue;
                // }

                // if($employee->officeEmail == $request->input('officeEmail')){
                //     $data['status'] = 'error';
                //     $data['message'] = 'Office Email already exists';
                //     $exist = true;
                //     continue;
                // }
            }

            if($exist == false){
                if($request->input('appraisal') == 'yes'){
                    $eID = Employee::where('eID', $id)->first();
                    if($eID){
                        $salary = Department::where('eID', $eID->eID)->first();
                        // dd($salary);
                        if($salary){
                            if($salary->ctc != $request->input('ctc')){
                                $appraisal_data = [
                                    'eID' => $eID->eID,
                                    'name' => $request->input('name'),
                                    'old_salary' => $salary->ctc,
                                    'appraisal_salary' => $request->input('ctc'),
                                    'take_effect' => $request->input('appraisalDate')
                                ];
                                Appraisal::create($appraisal_data);
                            } else {
                                $data['status'] = 'error';
                                $data['message'] = 'Please update appraisal salary';
                                return $data;
                            }
                        }
                    }
                }
                $data1= [
                    'name' => $request->input('name'),
                    'dob' => $request->input('dob'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'bloodgroup' => $request->input('bloodgroup'),
                    'address' => $request->input('address'),
                    'employeeType' => $request->input('employeeType'),
                    'company' => $request->input('company'),
                    'dateOfRelieving' =>$request->input('dateOfRelieving')

                ];

                Employee::where('id', $id)->update($data1);

                $data2 = [
                    'bankName' => $request->input('bankName'),
                    'branch' => $request->input('branch'),
                    'ifscCode' => $request->input('ifscCode'),
                    'accountNumber' => $request->input('accountNumber')
                ];

                Bankdetail::where('id', $id)->update($data2);

                $data3 = [
                    'officeEmail' => $request->input('officeEmail'),
                    'department' => $request->input('department'),
                    'designation' => $request->input('designation'),
                    'dateOfJoining' => $request->input('dateOfJoining'),
                    'ctc' => $request->input('ctc'),
                    'dateOfRelieving' =>$request->input('dateOfRelieving'),
                    'perfomance_bonus' => $request->input('PBorOA')
                ];

                Department::where('id', $id)->update($data3);

                $user = User::where('eID', $request->input('eID'))->count();

                if($user > 0){
                    User::where('eID', $request->input('eID'))->update([
                        'password' => md5($request->input('dob'))
                    ]);
                }

                $data['status'] = 'success';
                $data['message'] = 'Employee Updated successfully';
            }

            return $data;
        }

        // $data['employees'] = Employee::join('departments', 'departments.eID', '=', 'employees.eID')
        //                         ->join('bankdetails', 'bankdetails.eID', '=', 'employees.eID')
        //                         ->where('employees.isDeleted', '=', 'no')
        //                         ->where('employees.eID', '=', $id)
        //                         ->get();

        $data['employees'] = Employee::with('bankdetail','department')->where('employees.isDeleted','=','no')->where('employees.id','=',$id)->get();

        // dd($data['employees']);
        return view('employee.update', $data);
    }

    public function delete(Request $request, $id){

        $data1 = [
            'isDeleted' => 'yes'
        ];
        Employee::where('eID', $id)->update($data1);

        $data['status'] = 'success';
        $data['message'] = 'Employee deleted successfully';

        return redirect()->route('employee.all');
    }

    public function employee(Request $request, $id){

        if($request->isMethod('POST')){
            // dd($request->all());
            $salary = Salary::create([
                'eID' => $request->input('eID'),
                'name' => $request->input('name'),
                'current_salary' => $request->input('current_salary'),
                'paid_days' => $request->input('paid_days'),
                'lop' => $request->input('lop'),
                'paid_salary' => $request->input('paid_salary')
            ]);
            if($salary->id){
                $data['status'] = 'success';
                $data['message'] = 'Payslip created successfully';
            } else {
                $data['status'] = 'error';
                $data['message'] = 'Error in payslip generation';
            }
            return $data;
        }

        // $data['employees'] = Employee::join('departments', 'departments.eID', '=', 'employees.eID')
        //                         ->join('bankdetails', 'bankdetails.eID', '=', 'employees.eID')
        //                         ->where('employees.isDeleted', '=', 'no')
        //                         ->where('employees.eID', '=', $id)
        //                         ->get();

        $data['employees'] = Employee::with('bankdetail','department')->where('employees.isDeleted','=','no')->where('employees.id','=',$id)->get();
       
        return view('employee.details', $data);
    }

    public function access(Request $request){
        $employees = Employee::where('isDeleted', 'no')->get();

        $allEmployee = [];
        foreach ($employees as $employee) {
            $user = $this->findEmployeeInUsers($employee->eID);
            $employee->employeeLogin = $user != null ? 'on' : 'off';
            array_push($allEmployee, $employee);
        }
        $data['employees'] = $allEmployee;
        // dd($data);
        return view('employee.access', $data);
    }

    public function bank(){
        // $bank = Bank::groupBy('bank_name');
        $bank = Bank::all();
        $data['banks'] = $bank->groupBy('bank_name');
        // dd($data);
        return view('employee.bank', $data);

    }

    public function create_access(Request $request){
        // dd($request->all());
        $eID = $request->input('eID');
        $email = $request->input('email');
        $name = $request->input('name');
        $isDeleted = $request->input('isDeleted');

        $user = User::where('email', $email)->orWhere('eID', $eID)->count();
        $employee = $this->get_employee($eID);
        
        // dd($user, $employee);

        if($user > 0){
            $giveAccess = User::where('eID', $eID)->update([
                'isDeleted' => $isDeleted
            ]);

            if($giveAccess){
                Employee::where('eID', $eID)->update([
                    'employeeLogin' => $isDeleted == 1 ? 'off' : 'on',
                ]);
            }
            $data['status'] = 'success';
            $data['message'] = $isDeleted == 1 ? 'Activated login access' : 'Deactivated login access';
        } else {
            $password = $this->random_string();
            $createAccess = User::create([
                'name' => $name,
                'eID' => $eID,
                'email' => $email,
                'password' => $password,
                'isAdmin' => 0,
                'isDeleted' => $isDeleted,
            ]);

            if($createAccess->id){
                Employee::where('eID', $eID)->update([
                    'employeeLogin' => $isDeleted == 1 ? 'off' : 'on',
                ]);
            }

            if($createAccess->id){
                $return['name'] = $name;
                $return['contact_email'] = 'payroll@grinfotech.com';
                $return['url'] = '<a target="_blank" href="'.route("user", [$password, $createAccess->id]).'">Click here to set password</a>';
                $add_password = $this->send_mail('email.user', $return, 'Set password', $email);
                $data['status'] = 'success';
                $data['message'] = 'Activated login access';
                $data['login id'] = $createAccess->id;
            } else {
                $data['status'] = 'Error';
                $data['message'] = 'Error while creating login access';
            }
        }

        return $data;
    }

    public function get_salary(Request $request){
        // dd($request->all());

        $id = $request->input('id');
        $eID = $request->input('eID');
        $salary = $request->input('salary'); 
        $working_days = $request->input('working_days');
        $paid_days = $request->input('paid_days');
        $lop = $request->input('lop');
        $leave_days = $request->input('leave_days');
        $performance_bonus = $request->input('performance_bonus');
        $appraisal = $request->input('appraisalSalary');
        $professional_tax = $request->input('professional_tax');
        $tds = $request->input('tds');

       
        $data = $this->calculate_salary($salary, $paid_days, $lop, $performance_bonus, $professional_tax, $tds);
       
        return $data;
    }

    public function print_paySlip(Request $request, $id){
        if($request->isMethod('POST') && $id == 0){
            $employee = Employee::where('eID', $request->input('eID'));
            // dd($request->all(), $employee->first()->email);
            
            $checks = Salaryslip::where('eID','=',$request->input('eID'))->where('is_deleted','!=',1)->get();
        
            foreach($checks as $check){

                // $current_employee_forthemonth = explode( "/", $check->forTheMonth);
                // $check_salary_forTheMonth = $current_employee_forthemonth[0].'/'.$current_employee_forthemonth[2];
               

                // $input_month = explode('/', $request->input('forTheMonth'));
                // $input_salary_month =  $input_month[0].'/'. $input_month[2];  

                // dd($check_salary_forTheMonth,$input_salary_month);
                

                if($check->forTheMonth == $request->forTheMonth){
                   
                    $data['message'] = 'Salary slip already created for this employee';
                    $data['code'] = '302';
                    $data['status'] = 'error';
        
                    return $data;
                }
            }

            $checkSalarySlip = Salaryslip::where('eID', $request->input('eID'))->where('forTheMonth', $request->input('forTheMonth'))->where('employeeType','!=','freelancer')->first();
            // $department_id = Department::select('id')->get();
            
            // if($checkSalarySlip){
            //     $data['message'] = 'Salary slip already created for this employee';
            //     $data['code'] = '302';
            //     $data['status'] = 'error';

            //     return $data;
            // }

            // $salary_slip = Salaryslip::where('is_deleted','=','no')->get();

            // $department = Department::update([
            //     'salaryslip_id' =>$salary_slip->id
            // ]);
        
            $salarySlip = Salaryslip::create([
                'name' => $request->input('name'),
                'employeeType' => $request->input('employeeType'),
                'eID' => $request->input('eID'),
                'department' => $request->input('department'),
                'designation' => $request->input('designation'),
                'doj' => $request->input('doj'),
                'bankName' => $request->input('bankName'),
                'accountNumber' => $request->input('accountNumber'),
                'working_days' => $request->input('working_days'),
                'paid_days' => $request->input('paid_days'),
                'lop' => $request->input('lop'),
                'leave_days' => $request->input('leave_days'),
                'basic_wage' => $request->input('basic_wage'),
                'hra' => $request->input('hra'),
                'conveyance_allowances' => $request->input('conveyance_allowances'),
                'medical_allowances' => $request->input('medical_allowances'),
                'other_allowances' => $request->input('other_allowances'),
                'professional_tax' => $request->input('professional_tax'),
                'tds' => $request->input('tds'),
                'total_earnings' => $request->input('total_earnings'),
                'total_deductions' => $request->input('total_deductions'),
                'performance_bonus' => $request->input('performance_bonus') == null || '' ? 0 : $request->input('performance_bonus'),
                'net_salary' => $request->input('net_salary'),
                'forTheMonth' => $request->input('forTheMonth')
            ]);

            if($request->input('sendMail') == 'yes'){
                $return['url'] = '<a target="_blank" href="'.route("employee.print_paySlip", $salarySlip->id).'">Download your payslip here</a>';
                $return['name'] = $salarySlip->name;
                $return['month'] = $salarySlip->forTheMonth;
                $mail = $this->send_mail('email.payslip', $return, 'Payslip for '.$salarySlip->forTheMonth, $employee->first()->email);
                $data['message'] = $mail;
            }

            $data['id'] = $salarySlip->id;
            $data['status'] = 'success';
            $data['message'] = 'Salary slip created Successfully';
            return $data;
        }
        if($id != 0){
            $paySlip_details = Salaryslip::where('id', '=', $id)->first();
            // dd($paySlip_details);
            /* $this->generate_pdf(
                $paySlip_details->name,
                $paySlip_details->eID,
                $paySlip_details->designation,
                $paySlip_details->department,
                $paySlip_details->doj,
                $paySlip_details->bankName,
                $paySlip_details->accountNumber,
                $paySlip_details->working_days,
                $paySlip_details->paid_days,
                $paySlip_details->lop,
                $paySlip_details->leave_days,
                $paySlip_details->basic_wage,
                $paySlip_details->hra,
                $paySlip_details->conveyance_allowances,
                $paySlip_details->medical_allowances,
                $paySlip_details->other_allowances,
                $paySlip_details->professional_tax,
                $paySlip_details->tds,
                $paySlip_details->total_earnings,
                $paySlip_details->total_deductions,
                $paySlip_details->performance_bonus,
                $paySlip_details->net_salary,
            ); */
            $this->generate_pdf($paySlip_details);
        }
    }

    public function update_salary_slip(Request $request){
        // dd($request->all());
        $id = $request->input('id');
        $employee = Employee::where('eID', $request->input('eID'));
        $data = [
            'name' => $request->input('name'),
            'eID' => $request->input('eID'),
            'department' => $request->input('department'),
            'designation' => $request->input('designation'),
            'doj' => $request->input('doj'),
            'bankName' => $request->input('bankName'),
            'accountNumber' => $request->input('accountNumber'),
            'working_days' => $request->input('working_days'),
            'paid_days' => $request->input('paid_days'),
            'lop' => $request->input('lop'),
            'leave_days' => $request->input('leave_days'),
            'basic_wage' => $request->input('basic_wage'),
            'hra' => $request->input('hra'),
            'conveyance_allowances' => $request->input('conveyance_allowances'),
            'medical_allowances' => $request->input('medical_allowances'),
            'other_allowances' => $request->input('other_allowances'),
            'professional_tax' => $request->input('professional_tax'),
            'tds' => $request->input('tds'),
            'total_earnings' => $request->input('total_earnings'),
            'total_deductions' => $request->input('total_deductions'),
            'performance_bonus' => $request->input('performance_bonus') == null || '' ? 0 : $request->input('performance_bonus'),
            'net_salary' => $request->input('net_salary'),
            'forTheMonth' => $request->input('forTheMonth')
        ];
        
        $Salaryslip = Salaryslip::where('id', '=', $id)->update($data);
        if($request->input('sendMail') == 'yes'){
            $return['url'] = '<a target="_blank" href="'.route("employee.print_paySlip", $id).'">Download your payslip here</a>';
            $return['name'] = $request->input('name');
            $return['month'] = $request->input('forTheMonth');
            $mail = $this->send_mail('email.payslip', $return, 'Payslip for '.$request->input('forTheMonth'), $employee->first()->email);
            $return_data['message'] = $mail;
        }
        
        $paySlip_details = Salaryslip::where('id', '=', $id)->first();
        // $this->generate_pdf($paySlip_details);
        $return_data['id'] = $id;
        $return_data['status'] = 'success';
        $return_data['message'] ="Salary Updated Successfully";
        return $return_data;
    }

    public function mail_payslip(Request $request, $id){
        // dd($request, $id);
        $salaryslip = Salaryslip::where('id', '=', $id)->first();
        $employee = Employee::where('eID', $salaryslip->eID)->first();

        $return['url'] = '<a target="_blank" href="'.route("employee.print_paySlip", $id).'">Download your payslip here</a>';
        $return['name'] = $salaryslip->name;
        $return['month'] = $salaryslip->forTheMonth;
        $mail = $this->send_mail('email.payslip', $return, 'Payslip for '.$salaryslip->forTheMonth, $employee->email);

        $data['status'] = 'success';
        $data['message'] = $mail;

        return $data;
    }

    public function leave(Request $request){
        
        if($request->isMethod('POST')){

            $leaveDate = $request->input('leaveDate');
            $reason = $request->input('reason');

            $leave = Attendance::create([
                'eID' => Session::get('eID'),
                'leave_date' => $leaveDate,
                'reason' => $reason,
                'approved_by' => ''
            ]);
            
            if($leave->id){
                
            }
        }
        if(Session::get('isAdmin') == 0){
            $data['leave'] = Attendance::where('eID', Session::get('eID'))->get();
        } else {
            $data['leave'] = Attendance::all();
        }
        dd($data);
        return view('leave');
    }
}
