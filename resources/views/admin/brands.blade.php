<div class="container">
    <br>
    <h2>Marcas</h2>
    <section class="layoutgrid">
        @foreach ($brands as $brand)
        <div class="panel border d-flex flex-column">
            <div class="panel-image mt-2">
                @if($brand->brand_img != "")
                <img src="/storage/images/{{$brand->brand_img}}" width="200px" alt="não achado">
                @endif
            </div>
            <figcaption>{{$brand->brand_name}}</figcaption>
            <div class="mb-2">
                @can('isSuperadmin')
                <a href="/admin/editar-marca/{{$brand->id}}" class="btn btn-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                        <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                    </svg>
                </a>
                <a href="/admin/excluir-marca/{{$brand->id}}" class="btn btn-light border">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                        <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                    </svg>
                </a>
                @endcan
            </div>
        </div>
        @endforeach
    </section>
    <br>
    @can('isSuperadmin')
    <a class="btn btn-success" href="{{ route('admin.registerBrand') }}">Cadastrar marca</a>
    @endcan
    <a class="btn btn-outline-secondary" href="{{ route('index') }}">Voltar</a>
</div>