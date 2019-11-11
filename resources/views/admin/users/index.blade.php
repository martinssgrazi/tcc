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
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ implode(', ', $user->roles()->get()->pluck('nome')->toArray()) }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left">
                                <button type="button" class="btn btn-primary btn-sm ml-3"><i class="fas fa-user-edit"></i></button> 
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">
                                  @csrf
                                    {{ method_field('DELETE') }}
                                  <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form> 
                            </a>
                        </td>
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