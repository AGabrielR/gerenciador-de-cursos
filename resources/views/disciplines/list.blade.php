@extends('layouts.app')
@section('title')
Listagem de Disciplinas
@endsection


@section('content')
  <table class='table table-bordered table-striped table-hover'>
    <tr class='text-center'>
      <th>#</th><th>Nome</th><th>Carga Horária</th><th>Professores</th><th colspan="2">Ações</th>
    </tr>
    @foreach ($disciplines as $discipline)
      <tr>
        <td class='text-center'>{{ $discipline->id }}</td>
        <td>{{ $discipline->name }}</td>
        <td class="text-center">{{ $discipline->workload }}h</td>
        <td> {{ $discipline->teachers->pluck('name')->join(', ') }}</td>
        <td class ='text-center'>
          <form method="POST" action="{{route('discipline.delete')}}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $discipline->id }}">
            <button type="submit" class='btn btn-danger'>Deletar</button>
          </form>
        </td>
        <td class ='text-center'>
          <form method="GET" action="{{route('discipline.form')}}">
            <input type="hidden" name="id" value="{{ $discipline->id }}">
            <button class='btn btn-secondary'>Atualizar</button>
          </form>
          </td>
      </tr>
    @endforeach
  </table>
@endsection