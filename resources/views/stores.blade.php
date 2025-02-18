@extends('template')
@section('title', 'Estabelecimentos')

@section('content')
<div class="container">
    <br>
    <h2>Estabelecimentos</h2>

    <section class="layoutgrid">
        @foreach ($stores as $store)
        <div class="panel border">
	    @if($store->store_img != "")
            <a href="{{ route('store.products', ['id' => $store->id]) }}" class="image-container p-2">
                <img src="/storage/images/{{$store->store_img}}" alt="">
            </a>
	    @endif
            <p class="store-name px-2">{{$store->store_name}}</p>
	    @can('isSuperadmin')
            <div class="buttons-container mb-2">
                <a href="/admin/gerenciar-estoque/{{$store->id}}" class="btn btn-success">📄</a>
                <a href="/admin/editar-estabelecimento/{{$store->id}}" class="btn btn-dark">✏️</a>
                <a href="/admin/excluir-estabelecimento/{{$store->id}}" class="btn btn-light border">❌</a>
            </div>
	    @endcan
        </div>
        @endforeach
    </section>
    <br>
    @can('isSuperadmin')
    <a class="btn btn-success" href="/admin/cadastrar-estabelecimento">Cadastrar estabelecimento</a>
    @endcan
    <a class="btn btn-outline-secondary" href="{{ route('admin.management') }}">Voltar</a>
</div>
@endsection
