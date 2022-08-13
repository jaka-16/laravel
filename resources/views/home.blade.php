@extends('master')

@section('konten')
  <h4>Selamat Datang <b>{{empty(Auth::user()->email) ? '' : Auth::user()->email}}</b>.</h4>
@endsection