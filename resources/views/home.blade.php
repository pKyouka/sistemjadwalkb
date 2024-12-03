@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="dashboard-header">
        <img src="/path/to/your/logo.png" alt="Clinic Logo" class="clinic-logo">
        <h1>Dashboard</h1>
    </div>
@stop

@section('content')
    <p>Selamat datang di Sistem KB Rumah Sakit </p>
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
