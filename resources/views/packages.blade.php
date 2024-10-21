@extends('template')
@section('title', 'Pacotes')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Embalagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        @foreach ($packages as $package)
        <tr>
            <td>
                <p>{{$package->package_name}}</p>
            </td>
            <td>
                <a href="/admin/editar-embalagem/{{$package->id}}" class="btn btn-warning">Editar</a>
                <a href="/admin/excluir-embalagem/{{$package->id}}" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        @endforeach
    </table>

    <a class="btn btn-primary" href="/admin/cadastrar-embalagem">Cadastrar embalagem</a>
    <a class="btn btn-danger" href="/admin/gerenciar">Voltar</a>
</div>
@endsection