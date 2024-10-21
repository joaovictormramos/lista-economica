@extends('template')

@section('content')
    <div class="container">
        <form action="{{ route('admin.edit.store.product') }}" method="post">
        @csrf
            <div class="row">
                <img src="/storage/images/{{$product->product_img}}" style="width: 200px" alt="">
                <div class="col">
                    <h3>{{$product->product_name}} {{$product->brand->brand_name}} {{$product->product_description}} 
                        {{$product->package->package_name}} {{$product->product_measurement}} {{$product->product_unity_measurement}} 
                        {{$product->section->section_name}}</h3>
                </div>
                <div class="col">
                    <label for="price">R$
                        <input type="number" name="price" id="price" value="{{$product->pivot->product_price}}" min="0" step="0.01">
                        <input type="hidden" name="storeProductId" value="{{$product->id}}">
                        <input type="hidden" name="storeId" value="{{$product->pivot->store_id}}">
                    </label>
                </div>
            </div>
                <div>
                    <button class="btn btn-warning">Salvar alterações</button>
        </form>
                    <a href="/admin/remover-produto-estoque/{{$product->pivot->store_id}}/{{$product->id}}" class="btn btn-danger">Remover do estoque</a>
                    <a href="/admin/editar-produto-estabelecimento/{{$product->pivot->store_id}}" class="btn btn-danger">Voltar</a>
                </div>
    </div>
@endsection