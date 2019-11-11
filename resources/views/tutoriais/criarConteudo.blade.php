@extends('layouts.app')

@section('titulo')
    Home
@endsection

@section('content')

<div class="container">
    <form action="{{ route('tutoriais.store') }}" method="post">
    	<div>
	        <input type="textarea" name="editordata" class="summernote">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success mt-3">Enviar</button>
        </div>
    </form>
</div>

@endsection