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
                
                  <h5 class="card-title text-center">Resultados</h5>
                  <form class="form-signin" method="post" action="{{route('account.postsignin')}}">
                
                    <div class="form-label-group">
                      @if ($errors->has('Email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('Email') }}</strong>
                        </span>
                      @endif
                      <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus name="Email">
                      <label for="inputEmail">E-mail</label>
                    </div>

                    <div class="form-label-group">
                      @if ($errors->has('Codigo_Avaliacao'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('Codigo_Avaliacao') }}</strong>
                        </span>
                      @endif
                      <input type="text" id="inputPassword" class="form-control" placeholder="Código de avaliação" required name="Codigo_Avaliacao">
                      <label for="inputPassword">Código de Avaliação</label>
                    </div>

                    <!--<div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Lembrar senha</label>
                    </div>-->
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Acessar</button>
                    <hr class="my-4">
                    <!--<button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                    <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>-->
                    <div class="custom-control mb-3">
                      <a href="{{route('account.getrecovery')}}" class="btn btn-default"><small><i class="fas fa-key"></i> Esqueci meu código</small></a>
                    </div>                  
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