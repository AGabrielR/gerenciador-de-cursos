@extends('layouts.app')
<?php
    $isCreating = is_null($teacher);
    $operation = $isCreating ? 'Cadastrar' : 'Atualizar' 
?>

@section('title')
{{ $operation }} Professor
@endsection


@section('content')

<h2 class="mb-4">{{ $operation }} Professor</h2>
<form action="{{ $isCreating ? route('teacher.create') : route('teacher.update') }}" method="POST">
    @csrf
    @if ($isCreating === false)
        @method('PUT')
        <input hidden value="{{ $teacher->id }}" name="id">
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nome do Professor</label>
        <input type="text" name="name" id="name" value="{{ $teacher?->name }}" class="form-control" placeholder="Digite o nome do professor">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">E-mail</label>
        <input type="email" name="email" id="email" value="{{ $teacher?->email }}" class="form-control" placeholder="Digite o e-mail do professor">
    </div>

    <div class="mb-3">
      <label for="course" class="form-label">Curso</label>
      <select id="course" name="course" class="form-select">
        <option selected disabled>Selecione o Curso</option>
        @foreach ($courses as $course)
          @if ($course->id == $teacher?->course_id)
            <option selected value="{{ $course->id }}"> {{ $course->name }} </option>
          @else
            <option value="{{ $course->id }}"> {{ $course->name }} </option>
          @endif
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a class='btn btn-secondary text-white' href="{{ route('teacher.index') }}">Cancelar</a>
</form>
@endsection