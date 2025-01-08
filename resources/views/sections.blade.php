@extends('template')
@section('title', 'Seções')

@section('content')
<div class="container">
    <table class="table">
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
                <a href="/admin/editar-secao/{{$section->id}}" class="btn btn-warning">Editar</a>
                <a href="/admin/excluir-secao/{{$section->id}}" class="btn btn-danger">Excluir</a>
            </td>
            @endcan
        </tr>
        @endforeach
    </table>
    @can('isSuperadmin')
    <a class="btn btn-primary" href="/admin/cadastrar-secao">Cadastrar seção</a>
    @endcan
    <a class="btn btn-danger" href="/admin/gerenciar">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</div>
@endsection