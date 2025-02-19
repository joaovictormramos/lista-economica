@extends('template')
@section('title', $store->store_name)

@section('content')
<div class="container">
    <div class="overflow-hidden mb-4" style="height: 200px;">
        <img src="/storage/images/{{$store->store_img}}" alt="" style="width: 100%; height: 100%; object-fit: contain;">
    </div>
    <h3>{{$store->store_name}}</h3>

    <section class="layoutgrid">
        @foreach ($products as $product)
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
            </div>

        </div>
        @endforeach
    </section>

</div>

@endsection