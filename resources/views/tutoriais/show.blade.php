@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron flex-column d-flex justify-content-center">
            <h1>{{ $tutorial->titulo }}</h1>
            <p>{{ $tutorial->descricao }}</p>
        </div>

        @if (count($paginas) < 1)
            <div class="card">
                <div class="card-body">
                    <h3>Não há paginas</h3>
                </div>
            </div>
        @else
            @foreach($paginas as $pagina)
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>{{ $pagina->titulo }}</h3>
                    </div>
                    <div class="card-body table-responsive-sm">
                        {!!$pagina->conteudo !!}
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <a href="{{ route('paginas.edit', [$tutorial->id, $pagina->id]) }}" class="mt-3 btn btn-warning">Editar Página</a>
                </div>
            @endforeach
        @endif
        @if(Auth::id() == $tutorial->user_id)
            <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('paginas.create', $tutorial->id) }}" class="mt-3 btn btn-primary">Adicionar Página</a>
            </div>
        @endif
        {{ $paginas->links() }}
    </div>
        
@endsection