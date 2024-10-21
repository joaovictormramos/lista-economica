@extends('template')
@section('content')
<div class="container">
    <form action="/admin/cadastrar-secao" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$section->id}}">

        <label for="name">Seção</label>
        <input type="text" name="name" id="name" value="{{$section->section_name}}" required>

     @extends('template')
@section('content')
<div class="container">   @if ($section->id != 0)
        <button class="btn btn-primary">Salvar alterações</button>
        @else
        <button class="btn btn-primary">Cadastrar</button>
        @endif
    </form>
    <a class="btn btn-primary" href="/admin/secoes">Voltar</a>
</div>
@endsection