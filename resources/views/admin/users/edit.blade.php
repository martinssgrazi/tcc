@extends('layouts.app')

@section('content')

	<!-- <div class="jumbotron"></div> -->
	<div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">Manage {{ $user->name }}</div>

                  <div class="card-body">
                     <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        @foreach($roles as $role)
                          <div class="form-check">
                              <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                                  {{ $user->hasAnyRole($role->nome) ? 'checked':'' }}>
                              <label>{{ $role->nome }}</label>    
                          </div>
                          {{ method_field('PUT') }} 
                          @endforeach
                        <button type="submit" class="btn btn-primary"> Atualizar dados</button> 
                     </form>

                  </div>

              </div>

          </div>

      </div>
		
	</div>
@endsection