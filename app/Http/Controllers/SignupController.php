<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Authent;
use App\Signup;

use Session;

class SignupController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function create_user(Request $request){
        $Signup = new Signup;
        $email = $request->email;
        $pass = $request->password;
        
        $countEmail = $Signup->check_email($email);

        if($countEmail > 0){

            $status = array("message"=> "user is already exist");

            return response($status, 422)->header('Content-Type', 'application/json');
        }else{

            if(!Authent::isEmailValid($email)){

                $status = ["message"=> "email is not eligible"];

                return response($status, 422)->header('Content-Type', 'application/json');

            }else{

                if(Authent::isPasswordValid($pass)){

                    $hashpassword = Hash::make($pass);
                    $Signup->email = $email;
                    $Signup->password = $hashpassword;
                    $Signup->save();
                    $status = ["message"=> "new user has been registered"];
                    //return response($status, 200)->header('Content-Type', 'application/json');

                    return redirect('/');
                    
                }else{

                    $status = ["message"=> "password must be contains number, special character, upper-case letter, and lower-case letter"];
                    //return response($status, 422)->header('Content-Type', 'application/json');
                    Session::flash('error', "password must be contains number, special character, upper-case letter, and lower-case letter");
                    return redirect('register');

                }

            }
        }
    }

    public function login_user(Request $request){
        $Signup = new Signup;
        $email = $request->email;
        $pass = $request->password;

        $countEmail = $Signup->check_email($email);

        if($countEmail > 0){
            
            $emailData = $Signup->check_data_email($email)[0];
            $compare = Hash::check($pass, $emailData->password);
            if($compare){

                //$status = array("message"=> "Login is successed");
                //return response($status, 422)->header('Content-Type', 'application/json');
                $data = [
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                ];
        
                if (Auth::attempt($data)) {
                    return redirect('home');
                }else{
                    Session::flash('error', 'Email atau Password Salah');
                    return redirect('/');
                }

            }else{

            $status = array("message"=> "password is not match");
            //return response($status, 422)->header('Content-Type', 'application/json');
            Session::flash('error', 'Password Salah');
            return redirect('/');

            }

        }else{

            $status = array("message"=> "email is not found");
            //return response($status, 422)->header('Content-Type', 'application/json');
            Session::flash('error', 'Email Salah');
            return redirect('/');
        
        }


    }

}
