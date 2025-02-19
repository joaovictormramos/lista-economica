@extends('template')
@section('title', 'Cadastrar Estabelecimento')

@section('content')
<div class="container">
    <br>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if($store->id != 0)
    <h1>Editar Estabelecimento</h1>
    @else
    <h1>Cadastrar Estabelecimento</h1>
    @endif
    <form action="/admin/cadastrar-estabelecimento" method="post" enctype="multipart/form-data" class="form">
        @csrf
        <input type="hidden" name="id" value="{{$store->id}}">

        <div class="row mb-3">
            <!--Coluna da imagem-->
            <div class="col-md-4">
                <div class="row mb-3">
                    <div class="col">
                        <label for="store_img" class="form-label">Imagem</label>
                        <input type="file" name="store_img" class="form-control" accept="image/*" id="store_img">
                        <small class="form-text">Carregue uma imagem (PNG, JPG, WebP até 5MB)</small>

                        @if($store->store_img != "")
                        <div class="mt-2">
                            <img src="{{ asset('storage/images/' . $store->store_img) }}" alt="Logomarca do estabelecimento" class="img-fluid" style="max-width: 150px;">
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!--Coluna do formulário-->
            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">Estabelecimento</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$store->store_name}}" required>
                    </div>
                    <div class="col">
                        <label for="address" class="form-label">Endereço</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{$store->store_address}}" required>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <br>
                @if ($store->id != 0)
                <button class="btn btn-success">Salvar alterações</button>
                @else
                <button class="btn btn-success">Cadastrar</button>
                @endif
                <a class="btn btn-outline-secondary" href="/admin/estabelecimentos">Voltar</a>
            </div>
        </div>
    </form>
</div>
@endsection