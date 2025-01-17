@extends('template')
@section('title', 'Registrar marca')

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
    <h2>Cadastrar Marca</h2>
    <form action="/admin/cadastrar-marca" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$brand->id}}">

        <div class="row mb-3">
            <!--Coluna da imagem-->
            <div class="col-md-4">
                <div class="row mb-3">
                    <div class="col">
                        <label for="brand_img" class="form-label">Logomarca</label>
                        <input type="file" id="brand_img" name="brand_img" class="form-control" accept="image/*">
                        <small class="form-text">Carregue uma imagem (PNG, JPG, WebP até 5MB)</small>

                        @if($brand->brand_img)
                        <div class="mt-2">
                            <img src="{{ asset('storage/images/'.$brand->brand_img) }}" alt="Imagem do Marca" class="img-fluid" style="max-width: 150px;">
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!--Coluna do formulário-->
            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col">
                        <label for="brand_name" class="form-label">Marca</label>
                        <input type="text" id="brand_name" name="brand_name" class="form-control" placeholder="Insira o nome da marca" value="{{$brand->brand_name}}">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.brands') }}" class="btn btn-light">Cancelar</a>
                @if ($brand->id != 0)
                <button type="submit" class="btn btn-primary">Salvar edições</button>
                @else
                <button type="submit" class="btn btn-primary">Cadastrar produto</button>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection