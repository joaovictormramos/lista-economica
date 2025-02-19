@extends('template')

@section('content')
<div class="container mt-4">
    <form action="{{ route('admin.edit.store.product') }}" method="post" class="card p-4 shadow-sm">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4 text-center">
                <img src="/storage/images/{{$product->product_img}}" class="img-fluid rounded" style="width: 200px; height: 200px; object-fit: contain;" alt="">
            </div>
            <div class="col-md-8">
                <h3 class="fw-bold">{{$product->product_name}} {{$product->brand->brand_name}}</h3>
                <p class="text-muted">{{$product->product_description}}</p>
                <p><strong>Embalagem:</strong> {{$product->package->package_name}}</p>
                <p><strong>Medida:</strong> {{$product->product_measurement}} {{$product->product_unity_measurement}}</p>
                <p><strong>Seção:</strong> {{$product->section->section_name}}</p>
            </div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Preço (R$)</label>
            <div class="input-group w-25">
                <span class="input-group-text">R$</span>
                <input type="number" name="price" id="price" value="{{$product->pivot->product_price}}" class="form-control" min="0" step="0.01">
            </div>
            <input type="hidden" name="storeProductId" value="{{$product->id}}">
            <input type="hidden" name="storeId" value="{{$product->pivot->store_id}}">
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-success">Salvar alterações</button>
    </form>
    <a href="/admin/remover-produto-estoque/{{$product->pivot->store_id}}/{{$product->id}}" class="btn btn-danger">Remover do estoque</a>
    <a href="/admin/editar-produto-estabelecimento/{{$product->pivot->store_id}}" class="btn btn-secondary">Voltar</a>
</div>
</div>
@endsection