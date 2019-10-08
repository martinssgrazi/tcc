@extends('layouts.deaftech')

@section('titulo')
    Entrar
@endsection

@section('conteudo')
<div class="container">
    <div class="justify-content-center">
        
        <h2 class="text-center">{{ __('Entrar') }}</h2>

        <div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('E-Mail') }}</label>

                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Ex: joão@example.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Senha') }}</label>

                    <div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ex: 123456789">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Lembrar de mim') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Entrar') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
