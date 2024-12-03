@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Selamat datang di Sistem KB Rumah Sakit </p>
    <div class="text-center">
    <img src="{{ asset('vendor/adminlte/dist/img/logoklinik.png') }}" class="img-fluid" alt="Logo Klinik" style="max-width: 200px; margin: 20px 0;">
    </div>
@stop

@section('css')
    <style>
    .dashboard-header {
        display: flex;
        align-items: center;
    }
    .clinic-logo {
        width: 50px;
        height: 50px;
        margin-right: 15px;
    }
    </style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
