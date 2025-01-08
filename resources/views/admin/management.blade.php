<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="antialiased">
    <header>
        <h3>Painel do Administrador</h3>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/admin/estabelecimentos">Estabelecimentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/secoes">Seções</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/produtos">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/marcas">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/embalagens">Embalagens</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="nav-link text-danger">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</body>

</html>