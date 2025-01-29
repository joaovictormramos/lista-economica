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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <header class="p-3 mb-3 border-bottom fixed-top bg-white">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col">
                    <!--LOGOMARCA-->
                    <a href="{{ route('index') }}" class="navbar-brand">
                        <img src="/storage/images/carrinhoEconomico.png" width="70px" alt="LOGO">
                    </a>
                    <!--LOGOMARCA-->
                </div>
                <div class="col-5">
                    <!--FORMULÁRIO PARA BUSCAR PRODUTO, MARCA ETC-->
                    <form action=" {{ route('search') }}" method="get">
                        <div class="input-group">
                            <button class="btn btn-outline-success" type="submit" id="button-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#008000">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                </svg>
                            </button>
                            <input class="form-control input-lg" name="search" id="searchObj" type="text" placeholder="Busque por produto ou estabelecimento">
                        </div>
                    </form>
                    <!--FORMULÁRIO PARA BUSCAR PRODUTO, MARCA ETC-->
                </div>
                <!--OPÇÕES DE ENTRAR, CADASTRAR, SAIR (A DEPENDER DO AUTH())-->
                <div class="col">
                    @if (Route::has('login'))
                    <nav class="mx-3 flex flex-1 justify-end">
                        @auth
                        <div>
                            @can('isSuperadmin')
                            <a class="btn btn-outline-success me-2" href="{{ route('admin.management') }}">Painel Administrativo</a>
                            @else
                            <div class="dropdown">
                                <button class="btn btn-outline-success dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false"">
                                    <svg xmlns=" http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Dados pessoais</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('user.lists', ['id' => Auth::user()->id]) }}">Minhas listas</a></li>
                                    <li>
                                        <form class="d-inline" action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button class="dropdown-item text-danger">Sair</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @endcan
                        </div>
                        @else
                        <a class="btn btn-outline-success" href="{{ route('login') }}">Entrar</a>
                        @if (Route::has('register'))
                        <a class="btn btn-success" href="{{ route('register') }}">Cadastrar</a>
                        @endif
                        @endauth
                    </nav>
                    @endif
                </div>
                <!--OPÇÕES DE ENTRAR, CADASTRAR, SAIR (A DEPENDER DO AUTH())-->
            </div>
            <div class="row">
                <div class="col-6 mx-auto text-center">
                    <!--Lista não ordenada para navegação-->
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="{{ route('products') }}" class="nav-link px-2" style="color: green">Produtos</a></li>
                        <li><a href="{{ route('brands') }}" class="nav-link px-2" style="color: green">Marcas</a></li>
                        <li><a href="{{ route('stores') }}" class="nav-link px-2" style="color: green">Estabelecimentos</a></li>
                    </ul>
                    <!--Lista não ordenada para navegação-->
                </div>
            </div>
        </div>
    </header>
    <br>
    <main class="content">
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

                <strong>R$ {{$list->total}}</strong>

                <form action="{{ route('user.lowerPrice') }}" method="post">
                    @csrf
                    <input type="hidden" name="listId" value="{{$list->id}}">
                    <button class="btn btn-success" type="submit">Concluir</button>
                </form>
            </div>
        </div>
        @endforeach
    </main>

    <footer class="container py-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5>Inscreva-se no nosso boletim informativo</h5>
                    <p>Resumo mensal das nossas novidades interessantes.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Insira o email">
                        <button class="btn btn-primary" type="button">Inscrever</button>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center mt-4">© 2025 João Victor Molina Ramos.</p>
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