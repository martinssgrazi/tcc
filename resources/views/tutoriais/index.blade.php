@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="d-flex align-items-center">
			<h1 class="mr-2">Meus Tutoriais</h1>
			<a href="{{ route('tutoriais.create') }}" class="btn btn-sm btn-success">
				<i class="fas fa-plus"></i>
			</a>
		</div>
		@if(count($tutoriais) < 1)
			<h3 class="d-flex justify-content-center">Crie seu primeiro tutorial</h3>
		@else
			<div class="row">
				@foreach ($tutoriais as $tutorial)
					<div class="col-md-4 col-sm-3">
						<div class="card mt-2 mb-2">
							<div class="card-header">
								<h4 class="text-center">{{ $tutorial->titulo }}</h4>
							</div>
							<div class="card-body">
								<div class="d-flex justify-content-around">
									<a href="{{ route('tutoriais.show', $tutorial->id) }}" class="btn btn-primary btn-lg mr-3"><i class="fas fa-eye"></i></a>
									<a href="{{ route('tutoriais.edit', $tutorial->id) }}" class="btn btn-warning btn-lg mr-3"><i class="fas fa-edit"></i></a>
									<form action="{{ route('tutoriais.destroy', $tutorial->id) }}" method="POST">
										@csrf
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-danger btn-lg"><i class="fas fa-trash"></i></button>
									</form>
								</div>
							</div>
						</div>
					</div>				
				@endforeach
			</div>
			{{-- <div class="row justify-content-center">
				<div class="col-md-12 col-sm-12">
					<table class="table">
						<thead>
							<tr>
								<th scope="col" class="col-md-9 col-sm-4">Titulo</th>
								<th scope="col" class="col-md-1 col-sm-1">Visualizar</th>
								<th scope="col" class="col-md-1 col-sm-1">Editar</th>
								<th scope="col" class="col-md-1 col-sm-1">Excluir</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tutoriais as $tutorial)
								<tr>
									<td>{{ $tutorial->titulo }}</td>
									<td class="d-flex justify-content-center">
										<a href="{{ route('tutoriais.show', $tutorial->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
									</td>
									<td class="justify-content-center">
										<a href="{{ route('tutoriais.edit', $tutorial->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
									</td>
									<td class="justify-content-center">
										<form action="{{ route('tutoriais.destroy', $tutorial->id) }}" method="POST">
											@csrf
											{{ method_field('DELETE') }}
											<button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
										</form>
									</td>
								</tr>
							@endforeach   
						</tbody>
					</table>
				</div>
			</div> --}}
		@endif
	</div>
@endsection 