<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use crypt;
use Session;
use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        // 1 => Admin access
        // 2 => Employee access
        if(!Auth::check()){
            if($request->isMethod('post')){

                $email = $request->input('email');
                $password = $request->input('password');
                $credentials = [
                    "email" => $email,
                    "password" => $password
                ];

                $user = User::where('email', '=', $email)->where('isDeleted', '=', 0)->first();
                if($user){
                    if($user->password == md5($password)){
                        $isLogin = Auth::loginUsingId($user->id);
                        $data['status'] = 'Success';
                        $data['message'] = 'Login successful';
                    } else {
                        $isLogin = Auth::attempt($credentials); 
                        $data['status'] = "Error";
                        $data['message'] = 'Email or password incorrect. Try again';
                    }
                } else {
                    $isLogin = Auth::attempt($credentials);
                    $data['status'] = "Error";
                    $data['message'] = 'User not found';
                }

                if($isLogin){
                    Session::put('user_id', $user->id);
                    Session::put('isAdmin', $user->isAdmin);
                    Session::put('eID', $user->eID);
                    Session::put('email', $user->email);
                    return $data;
                    // return redirect()->route('/');
                } else {
                    return $data;
                }
                // dd($data);
            } else {
                return view('auth.login');
            }
        } else {
            return redirect()->route('index');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect('/login');
    }

    public function forgot(Request $request){
        if($request->isMethod('post')){

            $email = $request->input('email');
            $user = User::where('email', '=', $email);

            if($user->count() > 0){
                $password = $this->random_string();
                $user->update([
                    'password' => $password,
                ]);

                $data['status'] = 'error';
                $data['message'] = 'Error in sending password reset mail';
                if($user->first()->password == $password){
                    $return['url'] = '<a target="_blank" href="'.route("reset_password", [$password, $user->first()->id]).'">Click here to reset your password</a>';
                    $return['name'] = $user->first()->name;
                    $data['status'] = 'success';
                    $data['message'] = $this->send_mail('email.reset', $return, 'Password reset request', $user->first()->email);
                }
                return $data;
            } else {
                $data['status'] = 'Error';
                $data['message'] = 'Email not found <br /> please contact the administrator';
            }

            return $data;
        }
        return view('auth.forgot');
    }

    public function reset_password(Request $request, $token, $id){
        
        // dd($request->all(), $token, $id);
        $user = User::where('id', $id)->where('password', $token);
        if($user->count() > 0){
            if($request->isMethod('post')){
                $password = $request->input('password');
    
                $update_data = [
                    'password' => md5($password),
                ];
    
                $user->update($update_data);

                if($user->count() > 0){
                    $data['status'] = 'error';
                    $data['message'] = 'Unable to reset password <br /> please contact the administrator';
                } else {
                    $data['status'] = 'success';
                    $data['message'] = 'Password reset successful';
                }

                return $data;
            }
            return view('auth.reset');
        } else {
            return redirect('/');
        }
    }

    public function user(Request $request, $token, $id){
        $user = User::where('id', $id)->where('password', $token);
        if($user->count() > 0){
            if($request->isMethod('post')){
                $password = $request->input('password');
    
                $update_data = [
                    'password' => md5($password),
                ];
    
                $user->update($update_data);

                if($user->count() > 0){
                    $data['status'] = 'error';
                    $data['message'] = 'Unable to set password <br /> please contact the administrator';
                } else {
                    $data['status'] = 'success';
                    $data['message'] = 'Password added successfully';
                }

                return $data;
            }
            return view('auth.user');
        } else {
            return redirect('/');
        }
    }
}
