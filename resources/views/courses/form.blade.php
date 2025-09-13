@extends('layouts.app')
<?php
    $isCreating = is_null($course);
    $operation = $isCreating ? 'Cadastrar' : 'Atualizar' 
?>

@section('title')
{{ $operation }} Curso
@endsection


@section('content')

<h2 class="mb-4">{{ $operation }} Curso</h2>
<form action="{{ $isCreating ? route('course.create') : route('course.update') }}" method="POST">
    @csrf
    @if ($isCreating === false)
        @method('PUT')
        <input hidden value="{{ $course->id }}" name="id">
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nome do Curso</label>
        <input type="text" name="name" id="name" value="{{ $course?->name }}" class="form-control" placeholder="Digite o nome do curso">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Digite a descrição">{{ $course?->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a class='btn btn-secondary text-white' href="{{ route('course.index') }}">Cancelar</a>
</form>
@endsection