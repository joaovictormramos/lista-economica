@extends('template')
@section('title', $search)

@section('content')
<div class="container">
    @foreach($results as $product)
    <p>{{$product->product_name}}</p>
    @endforeach
</div>
@endsection