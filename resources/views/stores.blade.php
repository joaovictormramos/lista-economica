@extends('template')
@section('title', 'Estabelecimentos')

@section('content')
<div class="container">
    <h2>Estabelecimentos</h2>

    <section class="layoutgrid">
        @foreach ($stores as $store)
        <div class="card">
            @if ($store->store_img != "")
            <a href="{{ route('store.products', ['id' => $store->id]) }}">
                <img src="/storage/images/{{$store->store_img}}" alt="">
            </a>
            @endif
            <input type="hidden" name="store_id" value="{{$store->id}}">
            <p>{{$store->store_name}} - {{$store->store_address}}</p>
            @can('isSuperadmin')
            <a href="/admin/gerenciar-estoque/{{$store->id}}" class="btn btn-success">Gerenciar estoque</a>
            <a href="/admin/editar-estabelecimento/{{$store->id}}" class="btn btn-warning">Editar dados do estabelecimento</a>
            <a href="/admin/excluir-estabelecimento/{{$store->id}}" class="btn btn-danger">Excluir estabelecimento</a>
            @endcan
            
        </div>
        @endforeach
    </section>
    <br>
    @can('isSuperadmin')
    <a class="btn btn-primary" href="/admin/cadastrar-estabelecimento">Cadastrar estabelecimento</a>
    @endcan
    <a class="btn btn-danger" href="{{ route('index') }}">Voltar</a>
</div>
@endsection