@extends('layouts.app')

@section('titulo')
    Home
@endsection

@section('content')

<div class="container">
    <form action="{{ route('paginas.update', [$tutorial->id, $pagina->id]) }}" method="POST">
        @csrf

        <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="{{ $pagina->titulo }}">
        </div>
    	<div>
	        <textarea type="textarea" name="conteudo" class="summernote">{{ $pagina->conteudo }}</textarea>
        </div>
		{{ method_field('PUT') }}
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success mt-3">Enviar</button>
        </div>
    </form>
</div>

@endsection