@extends('layouts.app')
<?php
    $isCreating = is_null($discipline);
    $operation = $isCreating ? 'Cadastrar' : 'Atualizar' 
?>

@section('title')
{{ $operation }} Disciplina
@endsection


@section('content')

<h2 class="mb-4">{{ $operation }} Disciplina</h2>
<form action="{{ $isCreating ? route('discipline.create') : route('discipline.update') }}" method="POST">
    @csrf
    @if ($isCreating === false)
        @method('PUT')
        <input hidden value="{{ $discipline->id }}" name="id">
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nome da Disciplina</label>
        <input type="text" name="name" id="name" value="{{ $discipline?->name }}" class="form-control" placeholder="Digite o nome da disciplina">
    </div>

    <div class="mb-3">
        <label for="workload" class="form-label">Carga Horária</label>
        <input type="number" class="form-control" name="workload" id="workload" value="{{$discipline?->workload }}">
    </div>

    <div class="form-check">
      @foreach ($teachers as $teacher)
        <input class="form-check-input" @checked($discipline->teachers->pluck('id')->contains($teacher->id)) type="checkbox" name="teacher_id[]" value="{{$teacher->id}}">
          {{ $teacher->name }}
        <br>
      @endforeach
    </div>

    <br>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a class='btn btn-secondary text-white' href="{{ route('discipline.index') }}">Cancelar</a>
</form>
@endsection