@extends('layouts.app')

@section('content')

	<!-- <div class="jumbotron"></div> -->
	<div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">Manage users</div>

                  <div class="card-body">
                      <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Nome</th>
                              <th scope="col">Email</th>
                              <th scope="col">Roles</th>
                              <th scope="col">Ações</th>
  
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($users as $user)
                            <tr>
                                <th>{{ $user->name }} </th>
                                <th> {{ $user->email }} </th>
                                <th> {{ implode(',', $user->roles()->get()->pluck('nome')->toArray()) }} </th>
                                <th>
                                    <a href="{{ ('admin.users.edit', $user->id) }}">
                                        <button type="button" class="btn btn-primary btn-sm">Editar</button>  
                                    </a>
                                </th>
                            </tr>
                            @endforeach   
                          </tbody>
                        </table>


                  </div>

              </div>

          </div>

      </div>
		
	</div>
@endsection