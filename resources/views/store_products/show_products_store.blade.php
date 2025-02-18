@extends('template')
@section('title', $store->store_name)

@section('content')
<div class="container">
    <div class="overflow-hidden" style="height: 350px; border: solid black 2px">
        <img src="/storage/images/{{$store->store_img}}" alt="">
    </div>
    <h3>{{$store->store_name}}</h3>

    @foreach($products as $product)
    <p>
        {{$product->product_name}} {{$product->brand->brand_name}} <strong>R${{$product->pivot->product_price}}</strong>
    </p>
    @endforeach
</div>

@endsection