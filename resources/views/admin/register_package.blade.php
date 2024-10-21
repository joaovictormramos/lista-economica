@extends('template')
@section('content')
<div class="container">
    <form action="/admin/cadastrar-embalagem" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$package->id}}">

        <label for="name">Embalagem</label>
        <input type="text" name="name" id="name" value="{{$package->package_name}}">

        @if ($package->id != 0)
        <button class="btn btn-primary">Salvar alterações</button>
        @else
        <button class="btn btn-primary">Cadastrar</button>
        @endif
    </form>
    <a class="btn btn-primary" href="/admin/embalagens">Voltar</a>
</div>
@endsection