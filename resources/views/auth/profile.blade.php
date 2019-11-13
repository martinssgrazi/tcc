@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-6">
                <h1 class="text-center">Olá, {{ $user->name }}</h1>
                <form action="{{ route('profile.update', $user->name) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome </label>
                        <input type="text" name="name" class="form-control" id="name" required value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Endereço de E-mail </label>
                        <input type="text" name="email" class="form-control" id="email" required value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha </label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirme a senha </label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
                    </div>
                    <div class="card mt-3 mb-3">
                        <div class="card-header bg-dark"><span class="text-white">Informações adicionais</span></div>
                        <div class="card-body">
                            <h5 class="card-text">Registrado em: <span class="badge badge-dark text-white">{{ date_format($user->created_at, 'd/m/Y H:i:s') }}</span></h5>
                            <h5 class="card-text">Atualizado em: <span class="badge badge-dark text-white">{{ date_format($user->updated_at, 'd/m/Y H:i:s') }}</span></h5>
                        </div>
                    </div>
                    {{ method_field('PUT') }}
                    <button type="submit" class="btn btn-success mb-3">Salvar Dados</button>
                </form>
                <form action="{{ route('profile.destroy', $user->name) }}" method="POST">
                    @csrf

                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Excluir conta</button>
                </form>
            </div>
        </div>

    </div>
@endsection