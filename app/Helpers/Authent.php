<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class Authent{
    public static function isEmailValid($email){
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
            return false;
          }else{

            return true;

          }


    }

    public static function isPasswordValid($password){
        
        $isPass = preg_match("'^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@%$]).{8,15}$'", $password);
        
        if($isPass == 1){

            return true;
        }else{

            return false;
        }

    }

    public static function lengthChar($char, $limit){

        $length = Str::length($char);
        if($length > $limit || $length == 0){

            return false;

        }else{

            return true;
        }


    }

    public static function isNumber($num, $limit){
        $isNum = preg_match("'^[0-9]*$'", $num);
        $length = Str::length($num);
        if(!$isNum || $length > $limit){

            return false;

        }else{

            return true;
        }


    }


}