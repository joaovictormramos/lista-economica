@extends('template')
@section('title', "Detalhes da lista")

@section('content')
<div class="container mt-4">
    <br>

    <div class="d-flex align-items-baseline justify-content-between">
        <h1 class="">{{$list->title}}</h1>
        <h6>{{ date( 'd/m/Y' , strtotime($list->scheduled_date))}}</h6>
    </div>

    <ul class="list-group">
        @if($list && $list->products->count() > 0)
        @php
        $groupedProducts = $list->products->groupBy(function ($product) {
        return $product->product_name . '-' . $product->brand_id . '-' . $product->product_measurement . '-' . $product->product_unity_measurement;
        });
        @endphp

        <ul class="list-group">
            @foreach($groupedProducts as $group)
            @php
            $product = $group->first();
            $quantity = $group->count();
            @endphp
            <li class="list-group-item mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        @if($product->product_img)
                        <img src="{{ asset('storage/images/' . $product->product_img) }}" alt="{{ $product->product_name }}" class="mr-3" style="width: 50px; height: 50px; object-fit: contain;">
                        @else
                        <div class="mr-3" style="width: 50px; height: 50px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                            <span class="text-muted">No Image</span>
                        </div>
                        @endif
                        <div>
                            <h5 class="mb-1">{{ $product->product_name }}</h5>
                            <p class="mb-1">Marca: {{ $product->brand->brand_name }}</p>
                            <p class="mb-1">Tamanho: {{ $product->product_measurement }} {{ $product->product_unity_measurement }}</p>
                            <p class="mb-0">Embalagem: {{ $product->package->package_name }}</p>
                            @if($product->product_description)
                            <p class="mb-0 text-muted">Descrição: {{ $product->product_description }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="ml-3">
                        <span class="" style="font-size: 1rem;">Quantidade: {{ $quantity }}</span>
                    </div>
                </div>
            </li>
            @endforeach
            <div class="d-flex justify-content-between">
                <h6>Total: R$ {{ number_format($list->total, 2, ',') }}</h6>
                <h6>Onde ir: {{$list->store_name}}</h6>
            </div>
        </ul>
        @else
        <div class="alert alert-info">
            Esta lista não contém produtos.
        </div>
        @endif
</div>
@endsection