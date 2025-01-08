@extends('template')
@section('title', $store->store_name . ' | Adicionar ao estoque')

@section('content')

<div class="container">
    <h1>Produtos</h1>
    <form action="/admin/adicionar-produto" method="post">
        <input type="hidden" name="store_id value=" id">
        @csrf
        @foreach ($productsToRegisterAtStore as $product)
        <div class="row">
            <div class="col">
                <h3>{{$product->product_name}} {{$product->brand->brand_name}} {{$product->product_description}}
                    {{$product->package->package_name}} {{$product->product_measurement}} {{$product->product_unity_measurement}}
                    {{$product->section_name}}</h3>
            </div>
            <div class="col">
                <input type="checkbox" name="addProducts[{{$product->id}}][selected]" value="{{$product->id}}">
                <label for="price">R$
                    <input type="number" name="addProducts[{{$product->id }}][price]" id="price" min="0" step="0.01">
                </label>
            </div>
        </div>
        @endforeach
        <input type="hidden" name="store_id" value="{{$store->id}}">
        <button class="btn btn-primary">Cadastrar</button>
        <a class="btn btn-danger" href="{{ route('admin.manage.store', ['id' => $store->id]) }}">Voltar</a>
    </form>
</div>
@endsection