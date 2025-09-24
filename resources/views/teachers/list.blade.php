@extends('layouts.app')
@section('title')
Listagem de Professores
@endsection


@section('content')
  <a class='btn btn-primary text-light mb-1' href="{{ route('course.index') }}">Listagem de Cursos</a>
  
  <a class='btn btn-info text-light mb-1' href="{{ route('teacher.form') }}">Novo</a>
  <table class='table table-bordered table-striped table-hover'>
    <tr class='text-center'>
      <th>#</th><th>Nome</th><th>E-mail</th><th>Curso</th><th colspan="2">Ações</th>
    </tr>
    @foreach ($teachers as $teacher)
      <tr>
        <td class='text-center'>{{ $teacher->id }}</td>
        <td>{{ $teacher->name }}</td>
        <td>{{ $teacher->email }}</td>
        <td>{{ $teacher->course->name }}</td>
        <td class ='text-center'>
          <form method="POST" action="{{route('teacher.delete')}}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $teacher->id }}">
            <button type="submit" class='btn btn-danger'>Deletar</button>
          </form>
        </td>
        <td class ='text-center'>
          <form method="GET" action="{{route('teacher.form')}}">
            <input type="hidden" name="id" value="{{ $teacher->id }}">
            <button class='btn btn-secondary'>Atualizar</button>
          </form>
          </td>
      </tr>
    @endforeach
  </table>
@endsection