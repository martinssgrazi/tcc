@extends('layouts.app')

@section('content')
	<!-- <div class="jumbotron"></div> -->
	<div class="container-fluid">
        <h1 class="text-center">{{ $tutorial->titulo }}</h1>
		<div class="form-group row justify-content-center">
			<div class="col-10">
				<form method="post" action="{{ route('tutoriais.store') }}" role="form">
					@csrf
					<div class="form-group">
                        <label for="titulo">Título:</label>
                        <input class="form-control" type="text" name="titulo" id="titulo" value="{{ $tutorial->titulo }}">
					</div>
					<div class="form-group">		
						<label for="descricao">Descrição:</label>
						<textarea class="form-control" type="text" rows="5" name="descricao" id="descricao">{{ $tutorial->descricao }}</textarea>
					</div>
					<div class="form-group">
						<label for="link">Link</label>
						<input class="form-control" type="text" name="link" id="link" value="{{ $tutorial->link }}">
                    </div>
                    <h5>Paginas: </h5>
                    <ul class="list-group mb-3">
                        @if(count($tutorial->paginas) == 0)
                            <li class="list-group-item">Não há paginas</li>
                        @endif
                        @foreach($tutorial->paginas as $pagina)
                            <li class="list-group-item">
                                <a href="{{ route('paginas.edit', [$tutorial->id, $pagina->id]) }}" role="button"> {{ $pagina->titulo }}</a>
                            </li>
                        @endforeach
                    </ul>
                    {{ method_field('PUT') }}
					<button type="submit" class="btn btn-success mb-3">
						Salvar
					</button>
                </form>
                <a href="{{ route('tutoriais.index') }}" class="btn btn-danger">Cancelar</a>
			</div>
        </div>
	</div>
@endsection