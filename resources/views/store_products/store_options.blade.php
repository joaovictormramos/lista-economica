@extends('template')
@section('title', $store->store_name . ' | Gerenciar estoque')

@section('content')

<div class="container">
    <h2>{{$store->store_name}}</h2>

    <div class="card p-3 mt-3 shadow-sm">
        <a href="{{ route('admin.formaddproduct', ['id' => $store->id]) }}" class="btn btn-success m-1">Adicionar produtos</a>
        <a href="{{ route('admin.formeditproduct', ['id' => $store->id]) }}" class="btn btn-success m-1">Editar produtos</a>
        <a href="{{ route('admin.stores') }}" class="btn btn-outline-secondary m-1">Voltar</a>
    </div>

</div>

@endsection