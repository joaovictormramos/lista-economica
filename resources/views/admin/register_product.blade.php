@extends('template')

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

    <form action="/admin/cadastrar-produto" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">

        <div class="row">
            <img src="/storage/images/{{$product->product_img}}" style="width: 250px" alt="">
            <div class="col">
                <div class="row">
                    <div class="col m-1">
                        <label for="name">Produto</label>
                        <input type="text" name="name" id="name" value="{{$product->product_name}}" required>
                    </div>
                    <div class="col m-1">
                        <label for="brand_id">Marca</label>
                        <select name="brand_id" id="brand_id" required>
                            <option value="" disabled selected>Selecionar </option>
                            @foreach ($brands as $brand)
                            <option @if ($brand->id == $product->brand_id)
                                selected
                                @endif
                                value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col m-1">
                        <label for="description">Descrição</label>
                        <input type="text" name="description" id="description"
                            value="{{$product->product_description}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col m-1">
                        <label for="measurement">Medida</label>
                        <input type="number" name="measurement" id="measurement" step="0.01" min="0.01"
                            value="{{$product->product_measurement}}" style="width: 70px" required>

                        <label for="unity_measurement">Unidade de medida</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="unity_measurement"
                                id="unity_measurement_kg" value="m"
                                {{$product->product_unity_measurement == 'm' ? 'checked' : ''}} required>
                            <label class="form-check-label" for="unity_measurement_kg" title="Metros">m</label>

                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="unity_measurement"
                                id="unity_measurement_kg" value="Kg"
                                {{$product->product_unity_measurement == 'Kg' ? 'checked' : ''}} required>
                            <label class="form-check-label" for="unity_measurement_kg" title="Quilograma">Kg</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="unity_measurement"
                                id="unity_measurement_g" value="g"
                                {{$product->product_unity_measurement == 'g' ? 'checked' : ''}} required>
                            <label class="form-check-label" for="unity_measurement_g" title="Grama">g</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="unity_measurement"
                                id="unity_measurement_l" value="L"
                                {{$product->product_unity_measurement == 'L' ? 'checked' : ''}} required>
                            <label class="form-check-label" for="unity_measurement_l" title="Litro">L</label>

                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="unity_measurement"
                                id="unity_measurement_ml" value="mL"
                                {{$product->product_unity_measurement == 'mL' ? 'checked' : ''}} required>
                            <label class="form-check-label" for="unity_measurement_ml" title="Mililitro">mL</label>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col m-1">
                        <label for="package">Embalagem</label>
                        <select name="package" id="package" value="{{$product->product_package}}" required>
                            <option value="" disabled selected>Selecionar</option>
                            @foreach ($packages as $package)
                            <option @if ($package->id == $product->package_id)
                                selected
                                @endif
                                value="{{$package->id}}">{{$package->package_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col m-1">
                        <label for="section">Seção</label>
                        <select name="section" id="section" required>
                            <option value="" disabled selected>Selecionar</option>
                            @foreach ($sections as $section)
                            <option @if ($section->id == $product->section_id)
                                selected
                                @endif
                                value="{{$section->id}}">{{$section->section_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="product_img">Imagem</label>
                    <input type="file" name="product_img" accept="image/*" id="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($product->id != 0)
                <button class="btn btn-primary">Salvar alterações</button>
                @else
                <button class="btn btn-primary">Cadastrar</button>
                @endif
            </div>
            <div class="col">
                <a class="btn btn-danger" href="/admin/produtos">Voltar</a>
            </div>
        </div>
    </form>
</div>
</div>
@endsection