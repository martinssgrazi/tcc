@extends('layouts.app')

@section('content')

  <!-- <div class="jumbotron"></div> -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 col-sm-12">
          <div class="card">
              <div class="card-header">Manage users</div>

              <div class="card-body">
                <table class="table table-responsive-md">
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
                          <div class="d-flex justify-content-center flex-wrap">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="mb-2 ml-2 btn btn-primary btn-sm"><i class="fas fa-user-edit"></i></a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="ml-2">
                              @csrf
                                {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger btn-sm w-100"><i class="fas fa-trash"></i></button>
                            </form> 
                          </div>
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