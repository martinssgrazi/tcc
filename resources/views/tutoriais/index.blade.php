@extends('layouts.app')

@section('content')
	<div class="container">	
		<h1>Tutoriais</h1>

		@if(count($tutoriais) < 1)
			<h3 class="d-flex justify-content-center">Não há tutoriais disponiveis</h3>
		@else
			<div class="row">
				@foreach ($tutoriais as $tutorial)
					<div class="col-md-3">
						<div class="card border-secondary mb-3">
							<div class="card-header">{{ $tutorial->titulo }}</div>
							<div class="card-body text-secondary">
								<p class="card-text">{{ $tutorial->descricao }}</p>
								<p class="card-text blockquote-footer">Criado por <cite>{{ $tutorial->user->name }}</cite></p>
								<a href="{{ $tutorial->link }}">{{ $tutorial->link }}</a>
								<a class="btn btn-primary" role='button' href="{{ route('tutoriais.show', $tutorial->id) }}"> Visualizar Tutorial</a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@endif
	</div>
@endsection 