@extends('template')
@section('title', 'Seções')

@section('content')
<div class="container">
    <br>
    <table class="table text-center border">
        <thead>
            <tr>
                <th>Seções</th>
                @can('isSuperadmin')
                <th>Ações</th>
                @endcan
            </tr>
        </thead>
        @foreach ($sections as $section)
        <tr>
            <td>
                <p>{{$section->section_name}}</p>
            </td>
            @can('isSuperadmin')
            <td>
                <a href="/admin/editar-secao/{{$section->id}}" class="btn btn-dark">✏️</a>
                <a href="/admin/excluir-secao/{{$section->id}}" class="btn btn-light border">❌</a>
            </td>
            @endcan
        </tr>
        @endforeach
    </table>
    @can('isSuperadmin')
    <a class="btn btn-success" href="/admin/cadastrar-secao">Cadastrar seção</a>
    @endcan
    <a class="btn btn-outline-secondary" href="/admin">Voltar</a>
</div>
@endsection
