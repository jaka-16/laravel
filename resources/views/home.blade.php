@extends('master')

@section('konten')
  <h4>Selamat Datang <b>{{Auth::user()->email}}</b>.</h4>
@endsection