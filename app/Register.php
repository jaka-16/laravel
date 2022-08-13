<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Register extends Model
{
    //
    protected $table = 'registers';
    
    protected $filled = [ 
    "position_int", 
    "name", 
    "num_id", 
    "placeofbirth",
    "birthdate", 
    "gender", 
    "religion", 
    "blood_class", 
    "status", 
    "address_id", 
    "address", 
    "email", 
    "num_hp", 
    "num_hp_fr" ];

    public static function create($datas){

        $status = DB::table('registers')->insert($datas);
        return $status;
    }

    public static function select($datas){
        $dataAll = DB::table('registers')->select($datas);
        return $dataAll;
    }

    public static function updateData($datas, $id){
        $affected = DB::table('registers')->where('id', $id)->update($datas);
        return $affected;
    }

    public static function selectOneData($id){
        $oneData = DB::table('registers')->select('*')->where('id', '=', $id);
        return $oneData->get();
    }

    public static function deleteData($id){
        $deleted = DB::table('registers')->where('id', $id)->delete();
        return $deleted;
    }

    public static function search($nama){
        $searching = DB::table('registers')->where('name', 'like', '%'.$nama.'%')->get();
        return $searching;

    }
}
