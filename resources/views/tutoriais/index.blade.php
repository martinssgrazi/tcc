@extends('layouts.app')

@section('content')
  <h1>Tutoriais</h1>
  @foreach ($tutoriais as $tutorial)
    {{ $tutorial->titulo }}
  @endforeach
@endsection