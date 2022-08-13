<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tampilan Biodata</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('master')

@section('konten')
<h3>Data Calon Karyawan</h3>
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="btn btn-success" id="myLink" href="{{url('registerbiodata')}}"><i class="fa fa-plus"></i> Input Biodata </a>
  <form class="form-inline pull-right" action="{{ route('searching') }}" method="get" >
    <input id="search" type="search" id="form1" name="name" class="form-control">
    <button type="submit" class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-search"></i> Cari</button>
  </form>
</nav>
<table class="table table-bordered table-hover">
  <tr>
    <th>Nomor</th>
    <th>Posisi Yg ingin dilamar</th>
    <th>Nama</th>
    <th>Nomor KTP</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Jenis Kelamin</th>
    <th>Agama</th>
    <th>Golongan Darah</th>
    <th>Status</th>
    <th>Alamat KTP</th>
    <th>Tempat Domisili</th>
    <th>Email</th>
    <th>Nomor Telepon</th>
    <th>Nomor Telpon Org Terdekat</th>
    <th>Aksi</th>
  </tr>
    @foreach($biodata as $s)
  <tr>
    <td>{{$i = 1}}</td>
    <td>{{$s->position_int}}</td>
    <td>{{$s->name}}</td>
    <td>{{$s->num_id}}</td>
    <td>{{$s->placeofbirth}}</td>
    <td>{{$s->birthdate}}</td>
    <td>{{$s->gender}}</td>
    <td>{{$s->religion}}</td>
    <td>{{$s->blood_class}}</td>
    <td>{{$s->status}}</td>
    <td>{{$s->address_id}}</td>
    <td>{{$s->address}}</td>
    <td>{{$s->email}}</td>
    <td>{{$s->num_hp}}</td>
    <td>{{$s->num_hp_fr}}</td>
    <td>
      <a href="{{ url('updatebiodata', ['id' => $s->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
      <a href="deleted/{{$s->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
    @endforeach
</table>
<script>
$('#myLink').addClass('disabled');
$('#myLink').attr('Input Biodata', 'Disabled');
</script>
@endsection
</body>
</html>