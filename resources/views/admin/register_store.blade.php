@extends('template')
@section('content')
<div class="container">
    <form action="/admin/cadastrar-estabelecimento" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$store->id}}">

        @if ($store->store_img != "")
        <img src="/storage/images/{{$store->store_img}}" style="width: 70px" alt="">
        @endif

        <label for="name">Estabelecimento</label>
        <input type="text" name="name" id="name" value="{{$store->store_name}}" required>

        <label for="address">Endereço</label>
        <input type="text" name="address" id="address" value="{{$store->store_address}}" required>

        <label for="store_img">Imagem</label>
        <input type="file" name="store_img" accept="image/*" id="store_img">

        @if ($store->id != 0)
        <button class="btn btn-primary">Salvar alterações</button>
        @else
        <button class="btn btn-primary">Cadastrar</button>
        @endif
    </form>
    <a class="btn btn-primary" href="/admin/estabelecimentos">Voltar</a>
</div>
@endsection