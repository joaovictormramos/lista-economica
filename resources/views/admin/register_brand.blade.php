@extends('template')
@section('title', 'Registrar marca')

@section('content')
<div class="container">
    <form action="/admin/cadastrar-marca" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$brand->id}}">

        @if ($brand->brand_img != "")
        <img src="/storage/images/{{$brand->brand_img}}" style="width: 70px" alt="">
        @endif

        <label for="name">Marca</label>
        <input type="text" name="name" id="name" value="{{$brand->brand_name}}">

        <label for="brand_image">Imagem</label>
        <input type="file" name="brand_image" accept="image/*" id="">

        @if ($brand->id != 0)
        <button class="btn btn-primary">Salvar alterações</button>
        @else
        <button class="btn btn-primary">Cadastrar</button>
        @endif
    </form>
    <a class="btn btn-primary" href="/admin/marcas">Voltar</a>
</div>
@endsection