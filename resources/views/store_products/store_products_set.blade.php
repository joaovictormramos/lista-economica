@extends('template')
@section('title', $storeProducts["store"]->store_name . ' | Editar estoque')

@section('content')
<div class="container">
    <h1>Produtos</h1>
    @foreach ($storeProducts['products'] as $product)
    <div class="panel">
	<div class="">
        	<img src="/storage/images/{{$product->product_img}}" alt="">
        	{{$product->product_name}} {{$product->brand->brand_name}} {{$product->product_measurement}} {{$product->product_unity_measurement}} R${{number_format($product->pivot->product_price, 2, ',')}}
    	</div>
    </div>
    @endforeach
    <a href="{{ route('admin.manage.store', ['id' => $id]) }}" class="btn btn-danger">Voltar</a>
</div>

@endsection
