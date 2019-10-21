@extends('layouts.app')

@section('content')
	<div style="margin-bottom: 25px">	
		<h1>Tutoriais</h1>
	</div>

	<div class="row">
	@foreach ($tutoriais as $tutorial)
		<div class="col-md-3">
			<div class="card border-secondary mb-3" style="max-width: 18rem;">
				<div class="card-header">{{ $tutorial->titulo }}</div>
				<div class="card-body text-secondary">
					<p class="card-text">{{ $tutorial->descricao }}</p>
					<a href="{{ $tutorial->link }}">{{ $tutorial->link }}</a>
					<a class="btn-primary" role='button' href="{{ route('tutoriais.criarConteudo') }}"> CLICA AQUI</a>
				</div>
			</div>
		</div>
	@endforeach
	</div>
@endsection 