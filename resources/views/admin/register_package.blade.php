@extends('template')
@section('title', 'Cadastrar Embalagem')

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
<<<<<<< HEAD
	@if($package->id != 0)
       	<h1>Editar Embalagem</h1>
	@else
	<h1>Cadastrar Embalagem</h1>
	@endif
=======
        <h2>Cadastrar Embalagem</h2>
>>>>>>> de8416387bf0cdb0102ba5933b1dc1893152d16c
        <form action="/admin/cadastrar-embalagem" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$package->id}}">

            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col">
                       <label for="package_name" class="form-label">Embalagem</label>
                       <input type="text" id="package_name" name="package_name" class="form-control" placeholder="Insira o tipo de embalagem" value="{{$package->package_name}}" required>
                    </div>
                </div>
            </div>
s
            <div class="col-md-8">
                @if ($package->id != 0)
                <button type="submit" class="btn btn-success">Salvar edições</button>
                @else
                <button type="submit" class="btn btn-success">Cadastrar embalagem</button>
                @endif
                <a href="/admin/embalagens" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
