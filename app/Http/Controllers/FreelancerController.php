<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancer;
use App\Models\Employee;
use App\Models\FreelancerPayment;
use DB;
use App\Models\Salaryslip;

class FreelancerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $freelancers = Freelancer::where('isDeleted','no')->orderBY('eID', 'DESC')->get();;
        return view('freelancer.index',compact('freelancers'));
    }

    public function add(){
        $maxFreelancer = Freelancer::where('isDeleted','no')->max('eID');
        $maxEmployee = Employee::where('isDeleted','no')->max('eID');
        
        if($maxFreelancer > $maxEmployee ){
            $max_eID = $maxFreelancer;
        }else if($maxFreelancer < $maxEmployee ){
            $max_eID = $maxEmployee;
        }else{
            $max_eID =0;
        }
        

        $data['last_eID'] = $max_eID;
        // $freelancers = Freelancer::where('isDeleted','no')->orderBY('eID', 'DESC')->get();
        // $eID = [];

        // foreach($freelancers as $freelancer){
        //     array_push($eID, $freelancer->eID);
        // }
        // if(!empty($eID)){
        //     $data['last_eID'] = max($eID);
        // } else {
        //     $data['last_eID'] = '0';
        // }

        return view('freelancer.add', $data);
    }

    public function store(Request $request){
        if($request->isMethod('POST')){
           
            $name = $request->input('name');
            $dob = $request->input('dob');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $bloodgroup = $request->input('bloodgroup');
            $address = $request->input('address');
            $bankName = $request->input('bankName');
            $branch = $request->input('branch');
            $ifscCode = $request->input('ifscCode');
            $accountNumber = $request->input('accountNumber');
            $eID = $request->input('eID');

            $exist = false;
            $freelancers = Freelancer::all();

            foreach($freelancers as $freelancer){
                if($freelancer->email == $email){
                    $data['status'] = 'error';
                    $data['message'] = 'Email already exists';
                    $exist = true;
                    continue;
                }

                if($freelancer->accountNumber == $accountNumber){
                    $data['status'] = 'error';
                    $data['message'] = 'Account number already exists';
                    $exist = true;
                    continue;
                }

                if($freelancer->eID == $eID){
                    var_dump($freelancer->eID) ;
                    exit;
                    $data['status'] = 'error';
                    $data['message'] = 'Freelancer ID already exists';
                    $exist = true;
                    continue;
                }

                // if($freelancer->officeEmail == $officeEmail){
                //     $data['status'] = 'error';
                //     $data['message'] = 'Office Email already exists';
                //     $exist = true;
                //     continue;
                // }
            }

            if($exist == false){

                // Add employees personal in freelancers table
                $employee = Freelancer::create([
                    'eID' => $eID,
                    'name' => $name,
                    'dob' => $dob,
                    'email' => $email,
                    'phone' => $phone,
                    'bloodgroup' => $bloodgroup,
                    'address' => $address,
                    'employeeLogin' => 0,
                    'bankName'=> $bankName,
                    'branch'=>  $branch,
                    'ifscCode'=> $ifscCode,
                    'accountNumber'=> $accountNumber
                ]);
                
                if($freelancer->id ){
                    $data['status'] = 'success';
                    $data['message'] = 'Freelancer created successfully';
                } else {
                    $data['status'] = 'error';
                    $data['message'] = 'Unable to create Freelancer';
                }
            }

            return $data;
        }

    }

    public function update(Request $request,$id){

        if($request->isMethod('POST')){

            $exist = false;

            $freelancers = Salaryslip::where('id','=',$id)->where('is_deleted','=',0)->first();

            // foreach($freelancers as $freelancer){

            //     if($freelancer->email == $request->input('email')){
            //         $data['status'] = 'error';
            //         $data['message'] = 'Email already exists';
            //         $exist = true;
            //         continue;
            //     }

            //     if($freelancer->accountNumber == $request->input('accountNumber')){
            //         $data['status'] = 'error';
            //         $data['message'] = 'Account number already exists';
            //         $exist = true;
            //         continue;
            //     }

            //     if($freelancer->eID == $request->input('eID')){
            //         $data['status'] = 'error';
            //         $data['message'] = 'Employee ID already exists';
            //         $exist = true;
            //         continue;
            //     }

            //     // if($employee->officeEmail == $request->input('officeEmail')){
            //     //     $data['status'] = 'error';
            //     //     $data['message'] = 'Office Email already exists';
            //     //     $exist = true;
            //     //     continue;
            //     // }
            // }

            // if($exist == false){
            
                $data1= [
                    // 'eID' => $request->input('eID'),
                    // 'name' => $request->input('name'),
                    // 'dob' => $request->input('dob'),
                    // 'email' => $request->input('email'),
                    // 'phone' => $request->input('phone'),
                    // 'bloodgroup' => $request->input('bloodgroup'),
                    // 'address' => $request->input('address'),
                    // 'bankName'=> $request->input('bankName'),
                    // 'branch'=> $request->input('branch'),
                    // 'ifscCode'=> $request->input('ifscCode'),
                    // 'accountNumber'=> $request->input('accountNumber'),
                    'projectName' => $request->input('projectName'),
                    'freelancerAmount' => $request->input('amountPaid'),
                    'forTheMonth' => $request->input('paidDate'),

                ];

                Salaryslip::where('id', $id)->update($data1);

                // $user = User::where('eID', $request->input('eID'))->count();

                // if($user > 0){
                //     User::where('eID', $request->input('eID'))->update([
                //         'password' => md5($request->input('dob'))
                //     ]);
                // }

                $data['status'] = 'success';
                $data['message'] = 'Freelancer Updated successfully';
            // }

            return $data;
        }

        $freelancer = Salaryslip::where('id','=',$id)->where('is_deleted', '!=',1)->first();

        $email= Employee::select('email')->where('eID','=',$freelancer->eID)->first();
        $phone = Employee::select('phone')->where('eID','=',$freelancer->eID)->first();
        // $eID = [];
        // foreach($freelancers as $freelancer){
        //     array_push($eID, $freelancer->eID);
        // }
        // if(!empty($eID)){
        //     $data['last_eID'] = max($eID);
        // } else {
        //     $data['last_eID'] = '0';
        // }

        // $freelancer = 
        
        $data['freelancer'] = $freelancer;
        $data['email'] = $email;
        $data['phone'] = $phone;
        // dd($data['email']);
        
        return view('freelancer.edit',$data);
    }

    public function delete(Request $request, $id){

        $data1 = [
            'isDeleted' => 'yes'
        ];
        Freelancer::where('id', $id)->update($data1);

        $data['status'] = 'success';
        $data['message'] = 'Employee deleted successfully';

        return redirect()->route('freelancer.all');
    }

    public function view($id){

        $data['freelancers'] = Freelancer::where('id', '=', $id)->get();
        return view('freelancer.details', $data);
    }

   
    public function allPayments(){
        $payments['freelancers'] = FreelancerPayment::where('isDeleted','no')->orderBy('id',"DESC")->get();
        
        return view('freelancer.all_payments',$payments);
    }

    public function payFreelancer($id){

        // $data['freelancer'] = Employee::where('eID','=',$id)->where('isDeleted','no')->first();

        $data['freelancer'] = Employee::with('bankdetail')->where('employees.id','=',$id)->where('isDeleted','=','no')->first();
       
        return view('freelancer.details',$data);
    
    }

    public function payment(Request $request){
        if($request->isMethod('POST')){
           
            $name = $request->input('name');
            $dob = $request->input('dob');
            $email = $request->input('email');
            $employeeType = $request->input('employeeType');
            $phone = $request->input('phone');
            $bankName = $request->input('bankName');
            $accountNumber = $request->input('accountNumber');
            $eID = $request->input('eID');
            $ifscCode = $request->input('ifscCode');
            $branch = $request->input('branch');
            $projectName = $request->input('projectName');
            $amountPaid = $request->input('amountPaid');
            $paidDate =  $request->input('paidDate');
           
            $freelancerPayment = Salaryslip::create([
                'eID' => $eID,
                'name' => $name,
                'employeeType'=>$employeeType,
                'dob' => $dob,
                'email' => $email,
                'phone' => $phone,
                'bankName'=> $bankName,
                'branch'=>  $branch,
                'ifscCode'=> $ifscCode,
                'accountNumber'=> $accountNumber,
                'projectName' => $projectName,
                'freelancerAmount' => $amountPaid,
                'forTheMonth' => $paidDate,

            ]);
            
            if($freelancerPayment->id ){
                $data['status'] = 'success';
                $data['message'] = 'Freelancer Payment Added successfully';
            } else {
                $data['status'] = 'error';
                $data['message'] = 'Unable to Add Payment';
            }
            return $data;
        }
    }

}
 
