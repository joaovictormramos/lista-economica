@extends('template')
@section('title', $store->store_name . ' | Adicionar ao estoque')

@section('styles')
<style>
    .product-card {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        transition: all 0.3s ease;
        background: white;
    }

    .product-card:hover {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .product-card.selected {
        border-color: #10B981;
        background-color: #F0FDF4;
    }

    .price-input {
        max-width: 120px;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 0.5rem;
    }

    .price-input:focus {
        border-color: #10B981;
        outline: none;
        box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
    }

    .custom-checkbox {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Adicionar Produtos ao Estoque</h1>
        <h4 class="text-muted">{{ $store->store_name }}</h4>
    </div>

    <form action="/admin/adicionar-produto" method="post">
        @csrf
        <input type="hidden" name="store_id" value="{{ $store->id }}">

        <div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
            @foreach ($productsToRegisterAtStore as $product)
            <div class="col">
                <div class="product-card p-4" data-product-id="{{ $product->id }}">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="me-3">
                            <h5 class="mb-1">{{ $product->product_name }}</h5>
                            <p class="text-muted mb-2">
                                {{ $product->brand->brand_name }} -
                                {{ $product->package->package_name }}
                            </p>
                            <small class="text-muted d-block">
                                @php
                                $formattedMeasurement = $product->product_measurement == floor($product->product_measurement)
                                ? number_format($product->product_measurement, 0, ',', '.') // Sem casas decimais
                                : number_format($product->product_measurement, 2, ',', '.'); // Com 2 casas decimais
                                @endphp
                                {{$formattedMeasurement}} {{$product->product_unity_measurement}} |
                                {{ $product->section->section_name }}
                            </small>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="input-group me-3">
                                <span class="input-group-text">R$</span>
                                <input type="number"
                                    class="form-control price-input"
                                    name="addProducts[{{ $product->id }}][price]"
                                    min="0"
                                    step="0.01"
                                    placeholder="0,00">
                            </div>
                            <div class="form-check">
                                <input type="checkbox"
                                    class="form-check-input custom-checkbox"
                                    name="addProducts[{{ $product->id }}][selected]"
                                    value="{{ $product->id }}"
                                    id="check_{{ $product->id }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('admin.manage.store', ['id' => $store->id]) }}">
                Voltar
            </a>
            <button type="submit" class="btn btn-success px-4">
                Cadastrar Produtos
            </button>
        </div>
    </form>
</div>

@endsection