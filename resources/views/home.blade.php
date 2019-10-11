  @extends('layouts.app')

@section('titulo')
    Home
@endsection

@section('content')



<div class="container">
    <form action="#" method="post">
    	<div>
	        <input type="textarea" name="editordata" class="summernote">
	    </div>
        <button type="submit" class="btn btn-success" style="margin-top: 15px; margin-left: 500px;">Enviar</button>
    </form>
    <a class="btn btn-primary" href="{{ action('UserController@index') }}" role="button">Link</a>
</div>



@endsection