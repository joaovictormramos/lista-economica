<div class="container">
    <br>
    <h2>Produtos</h2>
    <!-- Search and Filter Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <!--<form action="" method="" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar produtos..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="brand" class="form-select">
                        <option value="">Todas as marcas</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->brand_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="section" class="form-select">
                        <option value="">Todas as seções</option>
                        @foreach($sections as $section)
                        <option value="{{ $section->id }}" {{ request('section') == $section->id ? 'selected' : '' }}>
                            {{ $section->section_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                </div>
            </form>-->
        </div>
    </div>

    <section class="layoutgrid">
        @if($products->isEmpty())
        <div class="alert alert-info w-100" role="alert">
            Nenhum produto encontrado com os filtros selecionados.
        </div>
        @endif

        @foreach ($products as $product)
        <div class="panel border">
            <img src="/storage/images/{{$product->product_img}}" alt="">
            <p>{{$product->product_name}} <strong>{{$product->brand->brand_name}}</strong> {{$product->product_measurement}} {{$product->product_unity_measurement}}</p>
            @can('isSuperadmin')
            <a href="{{ route('admin.editproduct', ['id' => $product->id]) }}" class="btn btn-dark">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                    <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                </svg>
            </a>
            <a href="{{ route('admin.deleteproduct', ['id' => $product->id]) }}" class="btn btn-light border">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                    <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                </svg>
            </a>
            @endcan
        </div>
        @endforeach
    </section>
    {{ $products->links() }}
    <br>
    @can('isSuperadmin')
    <a class="btn btn-success" href="{{ route('admin.registerproduct') }}">Cadastrar produto</a>
    <a class="btn btn-outline-secondary" href="{{ route('admin.management') }}">Voltar</a>
    @else
    <a class="btn btn-secondary" href="{{ route('index') }}">Voltar</a>
    @endcan
</div>

<script>
    $(document).ready(function() {
        // Message fadeout
        setTimeout(function() {
            $("#errormsg").hide();
        }, 3000);

        setTimeout(function() {
            $("#successmsg").hide();
        }, 3000);

        // Clear filters
        $('.clear-filters').click(function(e) {
            e.preventDefault();
            window.location = '';
        });
    });
</script>