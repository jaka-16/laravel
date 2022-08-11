<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Signup extends Model implements AuthenticatableContract


{
    use Authenticatable;
    
    protected $table = 'signups';
    
    protected $fillable = [
        'email', 'password'
    ];
    

    public function check_email($email){
        $is_email = DB::table($this->table)->where('email','=', $email)->get();
        return $is_email->count();
        
    }

    public function check_data_email($email){
        $is_email = DB::table($this->table)->where('email','=', $email)->get();
        return $is_email;
        
    }
}
