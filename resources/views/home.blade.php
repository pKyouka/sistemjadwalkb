@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="dashboard-header">
        <h1>Klinik Peratana 24 jam Firdaus</h1>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="welcome-card card shadow-sm">
                    <div class="card-body text-center">
                        <h2 class="welcome-text mb-4"></h2>
                        <div class="logo-container">
                            <img src="{{ asset('vendor/adminlte/dist/img/logopanjang.png') }}"
                                 class="img-fluid animated-logo"
                                 alt="Logo Klinik">
                        </div>
                        <p class="mt-4">Kami siap melayani Anda 24 jam dengan pelayanan terbaik.</p>
                        <a href="#" class="btn btn-primary mt-3">Pelajari Lebih Lanjut</a>
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
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .welcome-card {
        background: white;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .welcome-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .welcome-text {
        color: #333;
        font-weight: 600;
        font-size: 24px;
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
        transform: scale(1.05);
    }
    .btn-primary {
        background-color: #4CAF50;
        border-color: #4CAF50;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #45A049;
        transform: scale(1.05);
    }
    </style>
@stop

@section('js')
    <script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
