<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Biodata</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
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
            <form action="{{ route('registerbiodata') }}" method="post">
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
                    <input type="text" name="birthdate" class="form-control" placeholder="birthdate format YYYY/MM/DD" required="">
                </div>
                <div class="form-group">
                        <label>Jenis Kelamin</label> <br>
                    <div class="form-check form-check-inline">
                            <input type="radio" name="gender" value="L" id="search" selected>Laki-Laki
                            <input type="radio" name="gender" value="P" id="search" >Perempuan
                        </div>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <input type="text" name="religion" class="form-control" placeholder="religion" required="">
                </div>
                <div class="form-group">
                    <label>Golongan Darah</label>
                    <input type="text" name="blood_class" class="form-control" placeholder="blood class" required="">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="status" class="form-control" placeholder="status" required="">
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
    @endsection
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

    </script>
</body>
</html>