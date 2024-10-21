@extends('template')
@section('title', 'Marcas')

@section('content')

<div class="container">

    <h2>Marcas</h2>
    <section class="layoutgrid">
        @foreach ($brands as $brand)
            <div class="panel">
                @if($brand->brand_img != "")
                <img src="/storage/images/{{$brand->brand_img}}" width="200px" alt="não achado">
                @endif
                <figcaption>{{$brand->brand_name}}</figcaption>
                @can('isSuperadmin')
                <a href="/admin/editar-marca/{{$brand->id}}" class="btn btn-warning">Editar</a>
                <a href="/admin/excluir-marca/{{$brand->id}}" class="btn btn-danger">Excluir</a>
                @endcan
            </div>
        @endforeach
    </section>
    <br>
    @can('isSuperadmin')
    <a class="btn btn-primary" href="/admin/cadastrar-marca">Cadastrar marca</a>
    @endcan
    <a class="btn btn-danger" href="{{ route('index') }}">Voltar</a>
</div>
@endsection