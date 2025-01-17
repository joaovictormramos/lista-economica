@extends('template')
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
        <h2>Cadastro de Embalagem</h2>
        <form action="/admin/cadastrar-embalagem" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$package->id}}">

            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col">
                        <label for="package_name" class="form-label">Embalagem</label>
                        <input type="text" id="package_name" name="section_name" class="form-control" placeholder="Insira o tipo de embalagem" value="{{$package->package_name}}">
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <a href="/admin/embalagens" class="btn btn-light">Cancelar</a>
                @if ($package->id != 0)
                <button type="submit" class="btn btn-primary">Salvar edições</button>
                @else
                <button type="submit" class="btn btn-primary">Cadastrar produto</button>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection