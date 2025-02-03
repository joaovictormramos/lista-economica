
<div class="container">
    <br>
    <h2>Estabelecimentos</h2>

    <section class="layoutgrid">
        @foreach ($stores as $store)
        <div class="panel border">
            @if ($store->store_img != "")
            <a href="{{ route('store.products', ['id' => $store->id]) }}">
                <img src="/storage/images/{{$store->store_img}}" alt="">
            </a>
            @endif
            <input type="hidden" name="store_id" value="{{$store->id}}">

            <div class="mb-2">
                @can('isSuperadmin')
                <a href="/admin/gerenciar-estoque/{{$store->id}}" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                    <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm80-80h280v-80H280v80Zm0-160h400v-80H280v80Zm0-160h400v-80H280v80Zm200-190q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z"/>
                </svg>

                </a>
                <a href="/admin/editar-estabelecimento/{{$store->id}}" class="btn btn-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                        <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                    </svg>
                </a>

                <a href="/admin/excluir-estabelecimento/{{$store->id}}" class="btn btn-light border">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                        <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                    </svg>
                </a>
                @endcan
            </div>
        </div>
        <p>{{$store->store_name}}</p>
        @endforeach
    </section>
    <br>
    @can('isSuperadmin')
    <a class="btn btn-success" href="/admin/cadastrar-estabelecimento">Cadastrar estabelecimento</a>
    @endcan
    <a class="btn btn-outline-secondary" href="{{ route('index') }}">Voltar</a>
</div>