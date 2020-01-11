@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>
           
                <div class="card-body">

                
                    <form method="POST" action="{{ route('usuario.empleado')}}">
                        @csrf

                        <div class="form-group row">
                            <!--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>-->
                            <label for="parroquia"class="col-md-4 col-form-label text-md-right">Cédula del Empleado</label>
                            <div class="col-md-6">

                                <div class="col-md-6">
                                    <input id="name" type="hidden" class="form-control @error('name') is-invalid @enderror" name="name" value="1" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <select class="custom-select d-block w-100" name="cedula" required>
                                  <option value="">Escoger...</option>
                                  
                                  @foreach ($empleados as $item)

                                  @if ($item->usuarios == '[]')  
                                  <option>{{$item->cedula_empleado}}</option>
                                  @endif

                                  @endforeach
                                </select>
                                <div class="invalid-feedback">
                                  Por favor escoja una parroquia válida.
                                </div>
                            </div>
                           
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection