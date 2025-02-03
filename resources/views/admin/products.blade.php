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
            <div class="dropdown">
                @cannot('isSuperadmin')
                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">Adicionar à lista</button>
                @endif
                <form action="{{ route('user.addProduct') }}" method="post">
                    @csrf
                    <input type="hidden" name="product" value="{{$product->id}}">
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li>
                            @foreach($lists as $list)
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="checkbox-container mx-1" onclick="event.stopPropagation()">
                                    <input class="form-check-input" type="checkbox" name="list_id[]" id="list_{{$list->id}}" value="{{$list->id}}">
                                    <label for="list_{{$list->id}}">{{$list->title}}</label>
                                </div>
                                <span class="">
                                    <button class="btn btn-link btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#list{{$list->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#D9D9D9">
                                            <path d="M240-80q-50 0-85-35t-35-85v-120h120v-560l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v680q0 50-35 85t-85 35H240Zm480-80q17 0 28.5-11.5T760-200v-560H320v440h360v120q0 17 11.5 28.5T720-160ZM360-600v-80h240v80H360Zm0 120v-80h240v80H360Zm320-120q-17 0-28.5-11.5T640-640q0-17 11.5-28.5T680-680q17 0 28.5 11.5T720-640q0 17-11.5 28.5T680-600Zm0 120q-17 0-28.5-11.5T640-520q0-17 11.5-28.5T680-560q17 0 28.5 11.5T720-520q0 17-11.5 28.5T680-480ZM240-160h360v-80H200v40q0 17 11.5 28.5T240-160Zm-40 0v-80 80Z" />
                                        </svg>
                                    </button>
                                </span>
                            </div>
                            @endforeach
                        </li>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-link" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#75FB4C">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg>
                            </button>
                        </div>
                    </ul>
                </form>
            </div>
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
