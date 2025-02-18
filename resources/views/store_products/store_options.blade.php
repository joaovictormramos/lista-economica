@extends('template')
@section('title', $store->store_name . ' | Gerenciar estoque')

@section('content')

<div class="container">
    <h2>{{$store->store_name}}</h2>
    <a href="{{ route('admin.formaddproduct', ['id' => $store->id]) }}" class="btn btn-primary">Adicionar produtos</a>
    <a href="{{ route('admin.formeditproduct', ['id' => $store->id]) }}" class="btn btn-primary">Editar produtos</a>
    <a href="{{ route('admin.stores') }}" class="btn btn-danger">Voltar</a>
</div>

@endsection