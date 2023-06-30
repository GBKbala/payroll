<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use PDF;
use crypt;
use App\Models\Appraisal;
use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use Mail;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function department($department){

        // 1 => Developing
        // 2 => Testing
        // 3 => Project Management
        // 4 => HR

        if($department == '1') return 'Developing';

        if($department == '2') return 'Testing';

        if($department == '3') return 'Project Management';

        if($department == '4') return 'HR';

        return '-';

    }

    public function designation($designation){
        // 1 => Fresher/Trainee
        // 2 => Junior
        // 3 => Senior
        // 4 => Manager
        // 5 => Team Lead

        if($designation == '1') return 'Fresher/Trainee';

        if($designation == '2') return 'Junior';

        if($designation == '3') return 'Senior';

        if($designation == '4') return 'Manager';

        if($designation == '5') return 'Team Lead';

        return '-';
    }

    public function random_string(){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $token = '';
        for ($i = 0; $i < 6; $i++) {
            $token .= $characters[mt_rand(0, strlen($characters)-1)];
        }

        return md5($token);
    }

    public function create_employee_login($name, $eID, $email, $password, $deleted){

        $isDeleted = $deleted == 'off' ?  '1' : '0';
        $user = User::create([
            'name' => $name,
            'eID' => $eID,
            'email' => $email,
            'password' => md5($password),
            'isAdmin' => '0',
            'isDeleted' => $isDeleted
        ]);

        return $user;
    }

    public function get_employee($eID){
        return Employee::where('eID', $eID)->first();
    }

    public function current_ctc($id){
        return Appraisal::where('eID', '=', $id)->get();
    }

    public function get_office_email($eID){
        return Department::where('eID', '=', $eID)->first();
    }

    // public function generate_pdf($name, $eID, $designation, $department, $doj, $bankName, $accountNumber, $working_days, $paid_days, $lop, $leave_days, $basic_wage, $hra, $conveyance_allowances, $medical_allowances, $other_allowances, $professional_tax, $tds, $total_earnings, $total_deductions, $performance_bonus, $net_salary){
    public function generate_pdf($data){
        $name = $data->name;
        $eID = $data->eID;
        $designation = $data->designation;
        $department = $data->department;
        $doj = $data->doj;
        $bankName = $data->bankName;
        $accountNumber = $data->accountNumber;
        $working_days = $data->working_days;
        $paid_days = $data->paid_days;
        $lop = $data->lop;
        $leave_days = $data->leave_days;
        $basic_wage = $data->basic_wage;
        $hra = $data->hra;
        $conveyance_allowances = $data->conveyance_allowances;
        $medical_allowances = $data->medical_allowances;
        $other_allowances = $data->other_allowances;
        $professional_tax = $data->professional_tax;
        $tds = $data->tds;
        $total_earnings = $data->total_earnings;
        $total_deductions = $data->total_deductions;
        $performance_bonus = $data->performance_bonus;
        $net_salary = $data->net_salary;
        $monthNum = $data->forTheMonth;

        // $month = date("F", mktime(0, 0, 0, $monthNum, 10));
        // $year = date('Y');
        $today = date('d').'-'.date('m').'-'.date('Y');
        // set document information
        PDF::SetAuthor('GR Infotech');
        PDF::SetTitle($name.'-'.$monthNum);

        // set default header data
        // PDF::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        // PDF::setFooterData(array(0,64,0), array(0,64,128));

        // set header and footer fonts
        // PDF::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // PDF::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        // PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        // PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        // PDF::SetHeaderMargin(PDF_MARGIN_HEADER);
        // PDF::SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            PDF::setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set default font subsetting mode
        PDF::setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        PDF::SetFont('dejavusans', '', 14, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        PDF::AddPage();

        // set text shadow effect
        PDF::setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

        // Set some content to print
        $html = <<<EOD
            <table>
                <tr>
                    <th align="center">
                    <img src="/assets/images/GR_Infotech_final.jpg" />
                    </th>
                    <th>
                        <h1></h1>
                        <p></p>
                        <small>G2, 5, Bharathi Street, Radha Nagar, Chromepet, Chennai, Tamil Nadu 600044</small>
                    </th>
                </tr>
            </table>
            <h3 align="center">Pay Slip for $monthNum</h3>
            <table border="1">
                <tr>
                    <th align="center">Name of the Employee</th>
                    <th align="center">$name</th>
                    <th align="center">Date</th>
                    <th align="center">$today</th>
                </tr>
                <tr>
                    <th align="center">Employee ID</th>
                    <th align="center">$eID</th>
                    <th align="center"></th>
                    <th align="center"></th>
                </tr>
                <tr>
                    <th align="center">Designation</th>
                    <th align="center">$designation</th>
                    <th align="center"></th>
                    <th align="center"></th>
                </tr>
                <tr>
                    <th align="center">Department</th>
                    <th align="center">$department Team</th>
                    <th align="center">Bank Name</th>
                    <th align="center">$bankName</th>
                </tr>
                <tr>
                    <th align="center">DOJ</th>
                    <th align="center">$doj</th>
                    <th align="center">Bank A/C No</th>
                    <th align="center">$accountNumber</th>
                </tr>
            </table>
            <p></p>
            <table border="1">
                <tr>
                    <th align="center">Total Working Days</th>
                    <th align="center">$working_days</th>
                    <th align="center">Paid Days</th>
                    <th align="center">$paid_days</th>
                </tr>
                <tr>
                    <th align="center">LOP days</th>
                    <th align="center">$lop</th>
                    <th align="center">Leaves Taken</th>
                    <th align="center">$leave_days</th>
                </tr>
            </table>
            <p></p>
            <table border="1">
                <tr>
                    <th align="center" style="font-weight: bold;">Earnings</th>
                    <th></th>
                    <th align="center" style="font-weight: bold;">Deductions</th>
                    <th></th>
                </tr>
                <tr>
                    <td align="center">Basic Wage</td>
                    <td align="right">₹$basic_wage</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">HRA</td>
                    <td align="right">₹$hra</td>
                    <td align="center">Professional Tax</td>
                    <td align="right">₹$professional_tax</td>
                </tr>
                <tr>
                    <td align="center">Conveyance Allowances</td>
                    <td align="right">₹$conveyance_allowances</td>
                    <td align="center">TDS</td>
                    <td align="right">₹$tds</td>
                </tr>
                <tr>
                    <td align="center">Medical Allowances</td>
                    <td align="right">₹$medical_allowances</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">Other Allowances</td>
                    <td align="right">₹$other_allowances</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <table border="1">
                <tr>
                    <th style="font-weight: bold;" align="center">Total Earnings</th>
                    <th style="font-weight: bold;" align="right">₹$total_earnings</th>
                    <th style="font-weight: bold;" align="center">Total Deductions</th>
                    <th style="font-weight: bold;" align="right">₹$total_deductions</th>
                </tr>
                <tr>
                    <td align="center">Performance Bonus</td>
                    <td align="right">₹$performance_bonus</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <table border="1">
                <tr>
                    <th style="font-weight: bold;" align="right">Net Salary</th>
                    <th style="font-weight: bold;" align="right">₹$net_salary</th>
                </tr>
            </table>
            <p></p>
        EOD;

        // Print text using writeHTMLCell()
        PDF::writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        PDF::Output('example_001.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }

    public function calculate_salary($salary, $paid_days, $lop, $performance_bonus, $professional_tax, $tds){
        if($lop > 0){
            // var_dump($Lop);
            // var_dump($salary);
            // var_dump($paid_days);
            // exit;
            $oneDay_salary = $salary/$paid_days;
            $salary = $salary -($lop * $oneDay_salary);
        }
        // echo $oneDay_salary.'<br>';
        // echo $salary;
        // exit;
        $data['basic_wage'] = ceil($salary / 100 * 35);
        $data['hra'] = ceil($salary / 100 * 22);
        $data['conveyance_allowances'] = ceil($salary / 100 * 15);
        $data['medical_allowances'] = ceil($salary / 100 * 10);
        $data['other_allowances'] = ceil($salary / 100 * 18);
        $data['total_earnings'] = ceil($data['basic_wage']) + ceil($data['hra']) + ceil($data['conveyance_allowances']) + ceil($data['medical_allowances']) + ceil($data['other_allowances']) + $performance_bonus;
        $data['total_deductions'] = $professional_tax + $tds;
        $data['net_salary'] = ceil($data['total_earnings']) - ceil($data['total_deductions']);
        return $data;
    }

    public function appraisal_salary($salary, $paid_days, $lop, $performance_bonus, $professional_tax, $tds){

        $oneDay_salary = $salary/cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        if($lop > 0){
            $paid_days = $paid_days - $lop;
        }
        $salary = $oneDay_salary * $paid_days;

        $data['basic_wage'] = ceil($salary / 100 * 35);
        $data['hra'] = ceil($salary / 100 * 22);
        $data['conveyance_allowances'] = ceil($salary / 100 * 15);
        $data['medical_allowances'] = ceil($salary / 100 * 10);
        $data['other_allowances'] = ceil($salary / 100 * 18);
        $data['total_earnings'] = ceil($data['basic_wage']) + ceil($data['hra']) + ceil($data['conveyance_allowances']) + ceil($data['medical_allowances']) + ceil($data['other_allowances']) + $performance_bonus;
        $data['total_deductions'] = $professional_tax + $tds;
        $data['net_salary'] = ceil($data['total_earnings']) - ceil($data['total_deductions']);

        return $data;
    }

    public function send_mail($template, $data, $subject, $to){
        $name = 'HR';
        $from_email = env("MAIL_FROM_ADDRESS");
        $from_name = env('APP_NAME');

        Mail::send($template, $data, function($message) use ($to, $subject, $from_email, $from_name) {
            $message->to($to)
        				->from($from_email, $from_name)
        				->subject($subject);
        });
        return 'Mail sent successfully';
    }

    public function send_birthday_wishes($template, $data, $subject, $to){
        $from_email = 'admin@grinfotech.com';
        $from_name = env('APP_NAME');

        $send_mail = Mail::send($template, $data, function($message) use ($to, $subject, $from_email, $from_name) {
            $message->to($to)
        				->from($from_email, $from_name)
        				->subject($subject);
        });

        return $send_mail;
    }

    public function findEmployeeInUsers($eID){
        $user = User::where('eID', $eID)->first();
        
        return $user;
    }
}
