@extends('template')
@section('title', 'Cadastrar Seção')

@section('content')
<div class="container">
    <br>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row mb-3">
	@if($section->id != 0)
        <h1>Editar Seção</h1>
	@else
	<h1>Cadastrar Seção</h1>
	@endif
        <form action="/admin/cadastrar-secao" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$section->id}}">

            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col">
                       <label for="section_name" class="form-label">Seção</label>
                       <input type="text" id="section_name" name="section_name" class="form-control" placeholder="Insira o nome da seção" value="{{$section->section_name}}" required>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                @if ($section->id != 0)
                <button type="submit" class="btn btn-success">Salvar alterações</button>
            	@else
            	<button type="submit" class="btn btn-success">Cadastrar</button>
            	@endif
            	<a class="btn btn-outline-secondary" href="/admin/secoes">Voltar</a>
            </div>
        </form>
    </div>
</div>
@endsection
