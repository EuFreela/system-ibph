@extends('layout.app')
@section('content')
    
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">    
    @endsection

    <div class="primary">
      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                
                  @include('layout.msg')
                
                  <h5 class="card-title text-center">Recordar o meu código</h5>
                  <form class="form-signin" method="post" action="{{route('account.postrecovery')}}">
                
                    <div class="form-label-group">
                      @if ($errors->has('Email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('Email') }}</strong>
                        </span>
                      @endif
                      <input type="email" id="inputEmail" class="form-control" placeholder="Informe o E-mail" required autofocus name="Email">
                      <label for="inputEmail">E-mail</label>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Recordar</button>
                    <hr class="my-4">
                    <small><a href="{{route('account.getsignin')}}" class="btn btn-default"><i class="fas fa-sign-in-alt"></i> Login</a></small>  
                  @csrf
                  </form>

              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="second">
      <a href="https://www.ibph.com.br/" target="_blank"><img src="{{ asset('assets/wheel/img/index.png') }}" alt="Logo IBPH"></a>
    </div>
  
@endsection