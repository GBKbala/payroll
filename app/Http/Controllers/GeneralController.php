<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Birthday;

class GeneralController extends Controller
{
    public function birthday(){
        // date_default_timezone_set("Asia/Calcutta");

        $employees = Employee::all();

        $logFilePath = storage_path('logs/birthdayWishes.log');
        $logEntry = '[' . date('Y-m-d H:i:s') . ']  Birthday wishes sent to on Official mail' ."\n";
        file_put_contents($logFilePath, $logEntry, FILE_APPEND);
        
        foreach ($employees as $employee) {
            
            $dob = explode("/", $employee->dob);
            $month = $dob[0];
            $date = $dob[1];
            $dateMonth = $month."/".$date;
            $data['name'] = $employee->name;
            $officalMail = $this->get_office_email($employee->eID)->officeEmail;
            if($dateMonth == date('m/d')){

                $birthday = Birthday::where('eID', $employee->eID)->first();
                
                if($birthday){
                    if($birthday->office_mail == 0){
                        $officeMail = $this->send_birthday_wishes('email.birthday', $data, 'Happy Birthday - '.$employee->name, $officalMail);
                        if($officeMail){
                            $office_mail = 1;
                        } else {
                            $office_mail = 0;
                        }
                        Birthday::where('id', $birthday->id)->update([
                            'office_mail' => $office_mail
                        ]);
        
                        $logEntry = '[' . date('Y-m-d H:i:s') . ']  Birthday wishes sent to '. $employee->name .' on Official mail ('.$officalMail.')' ."\n";
                        file_put_contents($logFilePath, $logEntry, FILE_APPEND);
                    }

                    if($birthday->personal_mail == 0){
                        $personalMail = $this->send_birthday_wishes('email.birthday', $data, 'Happy Birthday - '.$employee->name, $employee->email);
                        if($personalMail){
                            $personal_mail = 1;
                        } else {
                            $personal_mail = 0;
                        }
                        Birthday::where('id', $birthday->id)->update([
                            'personal_mail' => $personal_mail
                        ]);

                        $logEntry = '[' . date('Y-m-d H:i:s') . ']  Birthday wishes sent to '. $employee->name .' on Personal mail ('.$personalMail.')' ."\n";
                        file_put_contents($logFilePath, $logEntry, FILE_APPEND);
                    }

                } else {
                    $officeMail = $this->send_birthday_wishes('email.birthday', $data, 'Happy Birthday - '.$employee->name, $officalMail);
                    $personalMail = $this->send_birthday_wishes('email.birthday', $data, 'Happy Birthday - '.$employee->name, $employee->email);
    
                    if($officeMail){
                        $office_mail = 1;
                        $logEntry = '[' . date('Y-m-d H:i:s') . ']  Birthday wishes sent to '. $employee->name .' on Official mail ('.$officalMail.')' ."\n";
                        file_put_contents($logFilePath, $logEntry, FILE_APPEND);
                    } else {
                        $office_mail = 0;
                    }
    
                    if($personalMail){
                        $personal_mail = 1;
                        $logEntry = '[' . date('Y-m-d H:i:s') . ']  Birthday wishes sent to '. $employee->name .' on Personal mail ('.$personalMail.')' ."\n";
                        file_put_contents($logFilePath, $logEntry, FILE_APPEND);
                    } else {
                        $personal_mail = 0;
                    }
                    
                    $birthday = Birthday::create([
                        'eID' => $employee->eID,
                        'office_mail' => $office_mail,
                        'personal_mail' => $personal_mail,
                    ]);
                }
            }
        }
    }
}
