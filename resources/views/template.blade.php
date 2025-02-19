<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/storage/images/carrinhoEconomico.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/storage/css/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="/storage/js/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body style="background-color: rgba(229, 244, 242, 1);">
    <header class="p-3 mb-3 border-bottom fixed-top" style="background-color: rgba(229, 244, 242, 1);">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <!--LOGOMARCA-->
                <a href="{{ route('index') }}" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="/storage/images/carrinhoEconomico.png" width="70px" alt="LOGO">
                </a>
                <!--LOGOMARCA-->

                <!--Lista não ordenada para navegação-->
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a class="nav-link px-2 link-success" href="{{ route('products') }}">Produtos</a>
                    </li>
                    <li>
                        <a class="nav-link px-2 link-success" href="{{ route('brands') }}">Marcas</a>
                    </li>
                    <li>
                        <a class="nav-link px-2 link-success" href="{{ route('stores') }}">Estabelecimentos</a>
                    </li>
                </ul>
                <!--Lista não ordenada para navegação-->

                <!--FORMULÁRIO PARA BUSCAR PRODUTO, MARCA ETC-->
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action=" {{ route('search') }}" method="get">
                    <input class="form-control" name="search" id="searchObj" type="search" placeholder="Buscar..." aria-label="Buscar...">
                </form>
                <!--FORMULÁRIO PARA BUSCAR PRODUTO, MARCA ETC-->

                <!--OPÇÕES DE ENTRAR, CADASTRAR, SAIR (A DEPENDER DO AUTH())-->
                @if (Route::has('login'))
                <div class="dropdown text-end">
                    @auth
                    @can('isSuperadmin')
                    <a class="btn btn-outline-success me-2" href="{{ route('admin.management') }}">Painel Administrativo</a>
                    @else
                    <div class="dropdown text-end">
                        <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"">
                                <svg xmlns=" http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Dados pessoais</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user.lists', ['id' => Auth::user()->id]) }}">Minhas listas</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form class="d-inline" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">Sair</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endcan
                    @else
                    <div class="text-end">
                        <a class="btn btn-outline-success" href="{{ route('login') }}">Entrar</a>
                        @if (Route::has('register'))
                        <a class="btn btn-success" href="{{ route('register') }}">Cadastrar</a>
                    </div>
                    @endif
                    @endauth
                    @endif
                </div>
                <!--OPÇÕES DE ENTRAR, CADASTRAR, SAIR (A DEPENDER DO AUTH())-->
            </div>
        </div>
    </header>

    <main class="content pt-3 pt-md-5 mt-3 mt-md-5 pt-lg-5 mt-lg-5">
        @yield('content')

        @foreach($lists as $list)
        <div class="offcanvas offcanvas-start" id="list{{$list->id}}">
            <div class="offcanvas-header">
                <h1 class="offcanvas-title">{{$list->title}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                @foreach($list->products as $product)
                <p>{{$product->product_name}}</p>
                @endforeach

                <strong>R$ {{ number_format($list->total, 2, ',') }}</strong>

                <form action="{{ route('user.lowerPrice') }}" method="post">
                    @csrf
                    <input type="hidden" name="listId" value="{{$list->id}}">
                    <button class="btn btn-success" type="submit">Concluir</button>
                </form>
            </div>
        </div>
        @endforeach
    </main>

    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
        </ul>
        <p class="text-center text-body-secondary">© 2025 João Victor Molina Ramos</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#brand').select2();
        });
    </script>
</body>
</body>

</html>