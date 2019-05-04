@extends('layout.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Features-Boxed.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Navigation-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
@endsection

@section('content')


    @include('layout.msg')
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><a class="navbar-brand" href="#"><img src="{{ asset('assets/wheel/img/index.png') }}" id="img-logo"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse text-uppercase invisible"
                    id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#">Rodas</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#">Agenda</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="features-boxed">
        <div class="container">
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a href="{{ URL('/'.session()->get('user.email')[0].'/'.session()->get('user.codaval')[0]) }}">
                        <div class="box"><i class="fa fa-pie-chart icon"></i></div>
                        <h3 class="name">RODAS DOS NÍVEIS DE SATISFAÇÃO</h3>
                    </a>
                </div>

                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a href="{{ route('calendar.getclientschedulelist') }}">
                     <div class="box"><i class="fa fa-calendar icon"></i></div>
                     <h3 class="name">AGENDA</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div></div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
@endsection