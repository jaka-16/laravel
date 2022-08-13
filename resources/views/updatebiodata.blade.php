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
    <div class="container"><br>
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center"><b>Register Form</b></h3>
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ url('updated/{id}') }}" method="get">
            @csrf
            @foreach($biodata as $s)
            <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="id" value="{{$s->id}}" class="form-control" placeholder="Posisi Yang akan dilamar" required="" readonly />
                </div>
                <div class="form-group">
                    <label>Posisi Yang ingin dilamar</label>
                    <input type="text" name="position_int" value="{{$s->position_int}}" class="form-control" placeholder="Posisi Yang akan dilamar" required="">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{$s->name}}" class="form-control" placeholder="name" required="">
                </div>
                <div class="form-group">
                    <label>Nomor KTP</label>
                    <input type="text" name="num_id" value="{{$s->num_id}}" class="form-control" placeholder="nomor ktp" required="">
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="placeofbirth" value="{{$s->placeofbirth}}" class="form-control" placeholder="placeofbirth" required="">
                </div>
                <div class="form-group">
                <label>Tanggal Lahir</label>
                    <input type="text" class="form-control datepicker" name="birthdate" value="{{$s->birthdate}}" placeholder="Date of everything" autocomplete="off">
                </div>
                <div class="form-group">
                        <label>Jenis Kelamin</label> <br>
                    <div class="form-check form-check-inline">
                            <input type="radio" name="gender" value="L" {{$s->gender == 'L' ? 'checked' : ''}} id="search">Laki-Laki
                            <input type="radio" name="gender" value="P" {{$s->gender == 'P' ? 'checked' : ''}} id="search">Perempuan
                        </div>
                </div>
                <div class="form-group">
                    <label for="empid" >Agama</label>
                    <select class="form-control" id="empid" name="religion">
                        <option value= "" >Select Religion</option>
                        <option value="Islam" {{$s->religion == 'Islam' ? 'selected' : ''}} >Islam</option>
                        <option value="Kristen" {{$s->religion == 'Kristen' ? 'selected' : ''}} >Kristen</option>
                        <option value="Hindu" {{$s->religion == 'Hindu' ? 'selected' : ''}} >Hindu</option>
                        <option value="Budha" {{$s->religion == 'Budha' ? 'selected' : ''}} >Budha</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="bloodid" >Golongan Darah</label>
                    <select class="form-control" id="bloodid" name="blood_class">
                        <option value= "">Select Blood Class</option>
                        <option value="A" {{$s->blood_class == 'A' ? 'selected' : ''}} >A</option>
                        <option value="B" {{$s->blood_class == 'B' ? 'selected' : ''}} >B</option>
                        <option value="O" {{$s->blood_class == 'O' ? 'selected' : ''}} >O</option>
                        <option value="AB" {{$s->blood_class == 'AB' ? 'selected' : ''}} >AB</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="statusid" >Status</label>
                    <select class="form-control" id="statusid" name="status">
                        <option value= "">Select Status</option>
                        <option value="Menikah" {{$s->status == 'Menikah' ? 'selected' : ''}} >Menikah</option>
                        <option value="Janda" {{$s->status == 'Janda' ? 'selected' : ''}} >Janda</option>
                        <option value="Duda" {{$s->status == 'Duda' ? 'selected' : ''}} >Duda</option>
                        <option value="Single" {{$s->status == 'Single' ? 'selected' : ''}} >Single</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat KTP</label>
                    <textarea type="text" name="address_id" value="{{$s->address_id}}" class="form-control" placeholder="addreess_id" required=""></textarea>
                </div>
                <div class="form-group">
                    <label>Alamat Domisili</label>
                    <textarea type="text" name="address" value="{{$s->address}}" class="form-control" placeholder="address" required=""></textarea>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{$s->email}}" class="form-control" placeholder="email" required="" readonly />
                </div>
                <div class="form-group">
                    <label>Nomor Hp</label>
                    <input type="text" name="num_hp" value="{{$s->num_hp}}" class="form-control" placeholder="Nomor HP" required="">
                </div>
                <div class="form-group">
                    <label>No Hp referensi</label>
                    <input type="text" name="num_hp_fr" value="{{$s->num_hp_fr}}" class="form-control" placeholder="Nomor HP Referensi" required="">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <hr>
                @endforeach
            </form>
        </div>
    </div>
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
        const radioButtons = document.querySelectorAll('input[name="gender"]');
        for(const radioButton of radioButtons){
            radioButton.addEventListener('select', showSelected);
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

        const radioButtons = document.querySelectorAll('input[name="size"]');
        for(const radioButton of radioButtons){
            radioButton.addEventListener('change', showSelected);
        }
    </script>
    @endsection
</body>
</html>