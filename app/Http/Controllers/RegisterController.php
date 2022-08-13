<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Register;
use App\Helpers\Authent;

use Session;

class RegisterController extends Controller
{
    //

    public function searching(request $request){

        $nama = $request->name;
        $selectData = Register::search($nama);
        return view('tampilanbiodata', ['data' => $selectData]); 

    }

    public function tampilanbiodatauser(request $request){
        $email = $request->email;
        $selectData = Register::searchEmail($email);
        return view('tampilanbiodatauser', ['biodata' => $selectData]);
    }

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
        $tgl_lhr = $request->birthdate;
        $jk = $request->gender;
        $agama = $request->religion;
        $gol_darah = $request->blood_class;
        $status = $request->status;
        $alamat_ktp = $request->address_id;
        $almat_tinggal = $request->address;
        $email = $request->email;
        $num_hp = $request->num_hp;
        $num_hp_fr = $request->num_hp_fr;
        $email2 = Auth::user()->role;

        if(!Authent::isNumber($num_ktp,16)){
            Session::flash('error', "character length is limit exceded in Nomor KTP field, character limit only 16 chars and only number");
            return redirect('registerbiodata');
        }else if(!Authent::lengthChar($jk,1)){
            Session::flash('error', "character length is limit exceded in jenis kelamin field, character limit only 1 char and only char L or P");
            return redirect('registerbiodata');
        }else if(!Authent::isNumber($num_hp,12)){
            Session::flash('error', "character length is limit exceded in nomor hp field, character limit only 12 chars and only number");
            return redirect('registerbiodata');
        }else if(!Authent::isNumber($num_hp_fr,12)){
            Session::flash('error', "character length is limit exceded in nomor hp referensi field, character limit only 12 chars and only number");
            return redirect('registerbiodata');
        }else if(!Authent::lengthChar($gol_darah,2)){
            Session::flash('error', "character length is limit exceded in golongan darah field, character limit only 2 chars and only A, AB, O, B");
            return redirect('registerbiodata');
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

        $selectData = Register::searchEmail($email2);
        if($email2 == "admin"){

            return redirect('tampilandata');
        }else{

            return redirect('showdata/'.$email);
        }    

    }

    public function update(request $request){

        $id = $request->id;
        $posisi = $request->position_int;
        $nama = $request->name;
        $num_ktp = $request->num_id;
        $tempat_lhr = $request->placeofbirth;
        $tgl_lhr = $request->birthdate;
        $jk = $request->gender;
        $agama = $request->religion;
        $gol_darah = $request->blood_class;
        $status = $request->status;
        $alamat_ktp = $request->address_id;
        $almat_tinggal = $request->address;
        $email = $request->email;
        $num_hp = $request->num_hp;
        $num_hp_fr = $request->num_hp_fr;
        $email2 = Auth::user()->role;
       
        if(!Authent::isNumber($num_ktp,16)){
            Session::flash('error', "character length is limit exceded in Nomor KTP field, character limit only 16 chars and only number");
            return redirect('updatebiodata/'.$id);
        }else if(!Authent::lengthChar($jk,1)){
            Session::flash('error', "character length is limit exceded in jenis kelamin field, character limit only 1 char and only char L or P");
            return redirect('updatebiodata/'.$id);
        }else if(!Authent::isNumber($num_hp,12)){
            Session::flash('error', "character length is limit exceded in nomor hp field, character limit only 12 chars and only number");
            return redirect('updatebiodata/'.$id);
        }else if(!Authent::isNumber($num_hp_fr,12)){
            Session::flash('error', "character length is limit exceded in nomor hp referensi field, character limit only 12 chars and only number");
            return redirect('updatebiodata/'.$id);
        }else if(!Authent::lengthChar($gol_darah,2)){
            Session::flash('error', "character length is limit exceded in golongan darah field, character limit only 2 chars and only A, AB, O, B");
            return redirect('updatebiodata/'.$id);
        }


        $datas = [

            "position_int" => $request->position_int, 
            "name" => $request->name, 
            "num_id" => $request->num_id, 
            "placeofbirth" => $request->placeofbirth,
            "birthdate" => $tgl_lhr, 
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
        $selectData = Register::searchEmail($email2);        
        if($email2 == "admin"){
            return redirect('tampilandata');
        }else{
            return redirect('showdata/'.$email);
        }     

    }

    public function delete(request $request){
        $id = $request->id;
        Register::deleteData($id);
        $selectData = Register::searchEmail($email);
        $email2 = Auth::user()->role;
        
        if($email2 == "admin"){
            return redirect('tampilandata');
        }else{
            return redirect('home');
        }     
    }
}
