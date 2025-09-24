@extends('layouts.app')
@section('title')
Listagem de Cursos
@endsection


@section('content')
  <a class='btn btn-primary text-light mb-1' href="{{ route('teacher.index') }}">Listagem de Professores</a>

  <a class='btn btn-info text-light mb-1' href="{{ route('course.form') }}">Novo</a>
  <table class='table table-bordered table-striped table-hover'>
    <tr class='text-center'>
      <th>#</th><th>Nome</th><th>Descrição</th><th colspan="2">Ações</th>
    </tr>
    @foreach ($courses as $course)
      <tr>
        <td class='text-center'>{{ $course->id }}</td>
        <td>{{ $course->name }}</td>
        <td>{{ $course->description }}</td>
        <td class ='text-center'>
          <form method="POST" action="{{route('course.delete')}}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $course->id }}">
            <button type="submit" class='btn btn-danger'>Deletar</button>
          </form>
        </td>
        <td class ='text-center'>
          <form method="GET" action="{{route('course.form')}}">
            <input type="hidden" name="id" value="{{ $course->id }}">
            <button class='btn btn-secondary'>Atualizar</button>
          </form>
          </td>
      </tr>
    @endforeach
  </table>
@endsection