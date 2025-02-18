@extends('template')
@section('title', 'Pacotes')

@section('content')
<div class="container">
    <br>
    <table class="table text-center border">
        <thead>
            <tr>
                <th>Embalagem</th>
                @can('isSuperadmin')
                <th>Ações</th>
                @endcan
            </tr>
        </thead>
        @foreach ($packages as $package)
        <tr>
            <td>
                <p>{{$package->package_name}}</p>
            </td>
	    @can('isSuperadmin')
            <td>
                <a href="/admin/editar-embalagem/{{$package->id}}" class="btn btn-dark">✏️</a>
                <a href="/admin/excluir-embalagem/{{$package->id}}" class="btn btn-light border">❌</a>
            </td>
	    @endcan
        </tr>
        @endforeach
    </table>
    @can('isSuperadmin')
    <a class="btn btn-success" href="/admin/cadastrar-embalagem">Cadastrar embalagem</a>
    @endcan
    <a class="btn btn-outline-secondary" href="/admin">Voltar</a>
</div>
@endsection
