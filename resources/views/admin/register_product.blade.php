@extends('template')
@section('title', 'Registrar novo produto')
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

    @if($product->id != 0)
    <h1>Editar Produto</h1>
    @else
    <h1>Cadastrar Produto</h1>
    @endif
    <form action="/admin/cadastrar-produto" method="post" enctype="multipart/form-data" class="form">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">

        <div class="row mb-3">
            <!-- Coluna da imagem -->
            <div class="col-md-4">
                <div class="row mb-3">
                    <div class="col">
                        <label for="product_img" class="form-label">Imagem do produto</label>
                        <input type="file" id="product_img" name="product_img" class="form-control" accept="image/*">
                        <small class="form-text">Carregue uma imagem (PNG, JPG, WebP até 5MB)</small>

                        @if($product->product_img)
                        <div class="mt-2">
                            <img src="{{ asset('storage/images/'.$product->product_img) }}" alt="Imagem do Produto" class="img-fluid" style="max-width: 150px;">
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Coluna do formulário -->
            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col">
                        <label for="product_name" class="form-label">Produto</label>
                        <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Insira o nome do produto" value="{{$product->product_name}}">
                    </div>
                    <div class="col">
                        <label for="brand_id" class="form-label">Marca</label>
                        <select id="brand_id" name="brand_id" class="form-select">
                            <option value="">Selecione a marca</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="measurement" class="form-label">Medida</label>
                        <input type="number" id="measurement" name="measurement" class="form-control" placeholder="Insira a medida" value="{{$product->product_measurement}}">
                    </div>
                    <div class="col">
                        <label class="form-label">Unidade</label>
                        <div class="d-flex gap-2">
                            <div class="form-check">
                                <input type="radio" id="product_unity_measurement_kg" name="product_unity_measurement" value="kg" class="form-check-input" {{ $product->product_unity_measurement == 'kg' ? 'checked' : '' }}>
                                <label for="product_unity_measurement_kg" class="form-check-label">kg</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="product_unity_measurement_g" name="product_unity_measurement" value="g" class="form-check-input" {{ $product->product_unity_measurement == 'g' ? 'checked' : '' }}>
                                <label for="product_unity_measurement_g" class="form-check-label">g</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="product_unity_measurement_l" name="product_unity_measurement" value="l" class="form-check-input" {{ $product->product_unity_measurement == 'l' ? 'checked' : '' }}>
                                <label for="product_unity_measurement_l" class="form-check-label">L</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="product_unity_measurement_ml" name="product_unity_measurement" value="ml" class="form-check-input" {{ $product->product_unity_measurement == 'ml' ? 'checked' : '' }}>
                                <label for="product_unity_measurement_ml" class="form-check-label">mL</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="package" class="form-label">Embalagem</label>
                        <select id="package" name="package" class="form-select">
                            <option value="">Selecione o tipo</option>
                            @foreach ($packages as $package)
                            <option value="{{ $package->id }}" {{ $product->package_id == $package->id ? 'selected' : '' }}>{{ $package->package_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="section" class="form-label">Seção</label>
                        <select id="section" name="section" class="form-select">
                            <option value="">Selecione a seção</option>
                            @foreach ($sections as $section)
                            <option value="{{ $section->id }}" {{ $product->section_id == $section->id ? 'selected' : '' }}>{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea id="description" name="description" class="form-control" placeholder="Insira a descrição">{{$product->description}}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="/admin/produtos" class="btn btn-outline-secondary">Cancelar</a>
            @if ($product->id != 0)
            <button type="submit" class="btn btn-success">Salvar edições</button>
            @else
            <button type="submit" class="btn btn-success">Cadastrar produto</button>
            @endif
        </div>
    </form>
</div>
@endsection
