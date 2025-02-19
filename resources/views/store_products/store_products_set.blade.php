@extends('template')
@section('title', $storeProducts["store"]->store_name . ' | Editar estoque')

@section('content')
<div class="container">
    <br>
    <h1>{{$storeProducts["store"]->store_name}}</h1>
    <section class="layoutgrid">
        @foreach ($storeProducts['products'] as $product)
        <div class="panel border">
            <img src="/storage/images/{{$product->product_img}}" alt="{{$product->product_name}}" class="image-container p-2">
            <p class="store-name px-2">{{$product->product_name}} <strong>{{$product->brand->brand_name}}</strong>
                @php
                $formattedMeasurement = $product->product_measurement == floor($product->product_measurement)
                ? number_format($product->product_measurement, 0, ',', '.') // Sem casas decimais
                : number_format($product->product_measurement, 2, ',', '.'); // Com 2 casas decimais
                @endphp
                {{$formattedMeasurement}} {{$product->product_unity_measurement}}
                <br>R$ {{ number_format($product->pivot->product_price, '2', ',') }}
            </p>
            <div class="buttons-container mb-2">
                <a href="{{ route('productStore.editPrice', ['storeId' => $storeProducts['store']->id, 'productId' => $product->id]) }}" class="btn btn-dark">✏️</a>
            </div>
        </div>
        @endforeach
        <a href="{{ route('admin.manage.store', ['id' => $id]) }}" class="btn btn-outline-secondary">Voltar</a>
    </section>
</div>

@endsection