@extends('layouts.app')

@section('content')
	<h1>Criar tutorial</h1>

	<!-- <div class="jumbotron"></div> -->
	<div class="container-fluid">
		<div class="form-group row justify-content-center">
			<div class="col-3">
				<form method="post" action="{{ route('tutorials.store') }}" role="form">
					<div class="form-group">
						<label for="titulo">Título:</label>
						<input class="form-control" type="text" name="titulo" id="titulo">
					</div>
					<div class="form-group">
							
						<label for="descricao">Descrição:</label>
						<textarea class="form-control" type="text" name="descricao" id="descricao"></textarea>
					</div>			
					<button type="submit" class="btn btn-primary">
						Enviar
					</button>
				</form>
			</div>
		</div>
	</div>
@endsection