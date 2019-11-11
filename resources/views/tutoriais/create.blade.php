@extends('layouts.app')

@section('content')
	<!-- <div class="jumbotron"></div> -->
	<div class="container-fluid">
		<h1>Criar tutorial</h1>
		<div class="form-group row justify-content-center">
			<div class="col-6">
				<form method="post" action="{{ route('tutoriais.store') }}" role="form">
					@csrf
					<div class="form-group">
						<label for="titulo">Título:</label>
						<input class="form-control" type="text" name="titulo" id="titulo">
					</div>
					<div class="form-group">		
						<label for="descricao">Descrição:</label>
						<textarea class="form-control" type="text" rows="5" name="descricao" id="descricao"></textarea>
					</div>
					<div class="form-group">
						<label for="link">Link</label>
						<input class="form-control" type="text" name="link" id="link">
					</div>
					
					<button type="submit" class="btn btn-primary">
						Enviar
					</button>
				</form>
			</div>
		</div>
	</div>
@endsection