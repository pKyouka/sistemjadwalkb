@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="dashboard-header">
        <h1>Dashboard</h1>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="welcome-card card shadow-sm">
                    <div class="card-body text-center">
                        <h2 class="welcome-text mb-4">Selamat Datang di Sistem KB Rumah Sakit</h2>
                        <div class="logo-container">
                            <img src="{{ asset('vendor/adminlte/dist/img/logopanjang.png') }}"
                                 class="img-fluid animated-logo"
                                 alt="Logo Klinik">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
    .dashboard-header {
        padding: 20px 0;
        background: linear-gradient(135deg, #4CAF50 0%, #2196F3 100%);
        margin: -20px -20px 20px -20px;
        padding: 20px;
        color: white;
        border-radius: 0 0 10px 10px;
    }
    .welcome-card {
        background: white;
        border-radius: 15px;
        transition: transform 0.3s ease;
        border: none;
    }
    .welcome-card:hover {
        transform: translateY(-5px);
    }
    .welcome-text {
        color: #333;
        font-weight: 600;
    }
    .logo-container {
        padding: 30px;
    }
    .animated-logo {
        max-width: 700px;
        margin: 20px 0;
        transition: all 0.3s ease;
    }
    .animated-logo:hover {
        transform: scale(1.02);
    }
    </style>
@stop

@section('js')
    <script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
