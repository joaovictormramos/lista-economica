@extends('template')
@section('title', 'Marcas')

@section('content')
<div class="container">
    <br>
    <h2>Marcas</h2>

    <section class="layoutgrid">
        @foreach ($brands as $brand)
        <div class="panel border">
            @if($brand->brand_img != "")
                <img src="/storage/images/{{$brand->brand_img}}" width="200px" alt="{{$brand->brand_name}}" class="image-container p-2">
            @endif
            <p class="store-name px-2">{{$brand->brand_name}}</p>
	    @can('isSuperadmin')
	    <div class="buttons-container mb-2">
                @can('isSuperadmin')
                <a href="/admin/editar-marca/{{$brand->id}}" class="btn btn-dark">✏️</a>
                <a href="/admin/excluir-marca/{{$brand->id}}" class="btn btn-light border">❌</a>
                @endcan
            </div>
            @endcan
        </div>
        @endforeach
    </section>
    <br>
    @can('isSuperadmin')
    <a class="btn btn-success" href="{{ route('admin.registerBrand') }}">Cadastrar marca</a>
    @endcan
    <a class="btn btn-outline-secondary" href="{{ route('admin.management') }}">Voltar</a>
</div>
@endsection
