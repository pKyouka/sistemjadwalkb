@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="dashboard-header">
        <h1 class="fade-in">Klinik Peratana 24 jam Firdaus</h1>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="welcome-card card shadow-sm fade-in-up">
                    <div class="card-body text-center">
                        <div class="logo-container">
                            <img src="{{ asset('vendor/adminlte/dist/img/logopanjang.png') }}"
                                 class="img-fluid animated-logo"
                                 alt="Logo Klinik">
                        </div>
                        <a href="#" class="btn btn-primary mt-4 pulse">Pelajari Lebih Lanjut</a>
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
        background: linear-gradient(135deg, #006064 0%, #20B2AA 100%);
        margin: -20px -20px 20px -20px;
        padding: 20px;
        color: white;
        border-radius: 0 0 20px 20px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .welcome-card {
        background: white;
        border-radius: 20px;
        transition: all 0.4s ease;
        border: none;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }

    .welcome-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .logo-container {
        padding: 20px;
    }

    .animated-logo {
        max-width: 600px;
        margin: 20px 0;
        transition: all 0.5s ease;
    }

    .animated-logo:hover {
        transform: scale(1.05) rotate(1deg);
    }

    .stat-item {
        padding: 20px;
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-5px);
    }

    .stat-item i {
        color: #20B2AA;
        margin-bottom: 10px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #20B2AA 0%, #006064 100%);
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(32, 178, 170, 0.4);
    }

    /* Animations remain the same */
    .fade-in {
        animation: fadeIn 1s ease-in;
    }

    .fade-in-up {
        animation: fadeInUp 1s ease-out;
    }

    .slide-in {
        animation: slideIn 1s ease-out;
    }

    .bounce-in {
        animation: bounceIn 1s ease-out;
    }

    .pulse {
        animation: pulse 2s infinite;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }
        50% {
            opacity: 0.9;
            transform: scale(1.1);
        }
        80% {
            opacity: 1;
            transform: scale(0.9);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    </style>
@stop

@section('js')
    <script>
    console.log("Welcome to Modern Dashboard!");
    </script>
@stop
