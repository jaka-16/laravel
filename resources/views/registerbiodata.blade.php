<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Biodata</title>  
</head>
<body>
@extends('master')

@section('konten')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center"><b>Register Form</b></h3>
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('registerbiodata') }}" method="get">
            @csrf
                <div class="form-group">
                    <label>Posisi Yang ingin dilamar</label>
                    <input type="text" name="position_int" class="form-control" placeholder="Posisi Yang akan dilamar" required="">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="name" required="">
                </div>
                <div class="form-group">
                    <label>Nomor KTP</label>
                    <input type="text" name="num_id" class="form-control" placeholder="nomor ktp" required="">
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="placeofbirth" class="form-control" placeholder="placeofbirth" required="">
                </div>
                <div class="form-group">
                <label>Tanggal Lahir</label>
                    <input type="text" class="form-control datepicker" name="birthdate" placeholder="Date of everything" autocomplete="off">
                </div>
                <div class="form-group">
                        <label>Jenis Kelamin</label> <br>
                    <div class="from control form-check form-check-inline">
                            <input type="radio" name="gender" value="L" id="search" selected>Laki-Laki
                            <input type="radio" name="gender" value="P" id="search" >Perempuan
                        </div>
                </div>
                <div class="form-group">
                    <label for="empid" >Agama</label>
                    <select class="form-control" id="empid" name="religion">
                        <option value= "" selected>Select Religion</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="bloodid" >Golongan Darah</label>
                    <select class="form-control" id="bloodid" name="blood_class" >
                        <option value= "" selected>Select Blood Class</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="O">O</option>
                        <option value="AB">AB</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="statusid" >Status</label>
                    <select class="form-control" id="statusid" name="status">
                        <option value= "" selected>Select Status</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Janda">Janda</option>
                        <option value="Duda">Duda</option>
                        <option value="Single">Single</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat KTP</label>
                    <textarea type="text" name="address_id" class="form-control" placeholder="addreess_id" required=""></textarea>
                </div>
                <div class="form-group">
                    <label>Alamat Domisili</label>
                    <textarea type="text" name="address" class="form-control" placeholder="address" required=""></textarea>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="email" readonly>
                </div>
                <div class="form-group">
                    <label>Nomor Hp</label>
                    <input type="text" name="num_hp" class="form-control" placeholder="Nomor HP" required="">
                </div>
                <div class="form-group">
                    <label>No Hp referensi</label>
                    <input type="text" name="num_hp_fr" class="form-control" placeholder="Nomor HP Referensi" required="">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <hr>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function(){
    $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
      lang: "id"
    });
  });
  </script>
    <script>
        const radioButtons = document.querySelectorAll('input[name="gender"]');
        for(const radioButton of radioButtons){
            radioButton.addEventListener('change', showSelected);
        }        
        
        function showSelected(e) {
            console.log(e);
            if (this.checked) {
                document.querySelector('#search') = this.value;
            }
        }
        $('#empid').on('click',function() {
            document.querySelector('#empid') = $(this).val();
        });
        $('#bloodid').on('click',function() {
            document.querySelector('#bloodid') = $(this).val();
            
        });
        $('#statusid').on('click',function() {
            document.querySelector('#statusid') = $(this).val();
        });
    
    </script>
    @endsection
</body>
</html>