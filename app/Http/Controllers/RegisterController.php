<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Register;
use App\Helpers\Authent;

use Session;

class RegisterController extends Controller
{
    //

    public function tampilanbiodata()
    {
         
        $biodataAll = Register::select('*')->get();
        return view('tampilanbiodata', ['biodata' => $biodataAll]);
    }

    public function filledField(request $request)
    {
        $id = $request->id; 
        $affected = Register::selectOneData($id);
        return view('updatebiodata', ['biodata' => $affected]);
    }

    public function register_biodata(request $request){

        $posisi = $request->position_int;
        $nama = $request->name;
        $num_ktp = $request->num_id;
        $tempat_lhr = $request->placeofbirth;
        $birthdate = $request->birthdate;
        $date = date_create($birthdate);
        if(!$date && strlen($birthdate) != 8){
            Session::flash('error', "incorrect format date, use format YYYYMMDD"); 
        }
        $tgl_lhr = date_format($date, "Y-m-d"); 
        $jk = $request->gender;
        $agama = $request->religion;
        $gol_darah = $request->blood_class;
        $status = $request->status;
        $alamat_ktp = $request->address_id;
        $almat_tinggal = $request->address;
        $email = $request->email;
        $num_hp = $request->num_hp;
        $num_hp_fr = $request->num_hp_fr;


        if(!Authent::isNumber($num_ktp,16)){
            Session::flash('error', "character length is limit exceded, character limit only 16 chars and only number");
            
        }else if(!Authent::lengthChar($jk,1)){
            Session::flash('error', "character length is limit exceded, character limit only 1 char and only char L or P");
            
        }else if(!Authent::isNumber($num_hp,12)){
            Session::flash('error', "character length is limit exceded, character limit only 12 chars and only number");
           
        }else if(!Authent::isNumber($num_hp_fr,12)){
            Session::flash('error', "character length is limit exceded, character limit only 12 chars and only number");
            
        }else if(!Authent::lengthChar($gol_darah,2)){
            Session::flash('error', "character length is limit exceded, character limit only 2 chars and only A, AB, O, B");
            
        }
        
        
        Register::create([

            "position_int" => $posisi, 
            "name" => $nama, 
            "num_id" => $num_ktp, 
            "placeofbirth" => $tempat_lhr,
            "birthdate" => $tgl_lhr, 
            "gender" => $jk, 
            "religion" => $agama, 
            "blood_class" => $gol_darah, 
            "status" => $status, 
            "address_id" => $alamat_ktp, 
            "address" => $almat_tinggal, 
            "email" => $email, 
            "num_hp" => $num_hp, 
            "num_hp_fr" => $num_hp_fr

        ]);

        return redirect('/tampilandata');    

    }

    public function update(request $request){
        $id = $request->id;
        
        $datas = [

            "position_int" => $request->position_int, 
            "name" => $request->name, 
            "num_id" => $request->num_id, 
            "placeofbirth" => $request->placeofbirth,
            "birthdate" => $request->birthdate, 
            "gender" => $request->gender, 
            "religion" => $request->religion, 
            "blood_class" => $request->blood_class, 
            "status" => $request->status, 
            "address_id" => $request->address_id, 
            "address" => $request->address, 
            "email" => $request->email, 
            "num_hp" => $request->num_hp, 
            "num_hp_fr" => $request->num_hp_fr

        ];
        
        Register::updateData($datas, $id);
        return redirect('tampilandata');

    }

    public function delete(request $request){
        $id = $request->id;
        Register::deleteData($id);
        return redirect('tampilandata');

    }
}
