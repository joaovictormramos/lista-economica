@extends('template')
@section('title', $storeProducts["store"]->store_name . ' | Editar estoque')

@section('content')
<div class="container">
    <h1>Produtos</h1>
    @foreach ($storeProducts['products'] as $product)
    <div>
        
    </div>
    @endforeach
    <a href="{{ route('admin.manage.store', ['id' => $id]) }}" class="btn btn-danger">Voltar</a>
</div>

@endsection