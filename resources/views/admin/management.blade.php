<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/storage/images/carrinhoEconomico.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/storage/css/estilo.css">
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="/storage/images/carrinhoEconomico.png" alt="" width="40px">
                <span class="fs-4">Painel Administrativo</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto" id="sidebar-menu">
                <li class="nav-item"><a href="#" onclick="loadContent('estabelecimentos', this)" class="nav-link text-success">Estabelecimentos</a></li>
                <li><a href="#" onclick="loadContent('marcas', this)" class="nav-link text-success">Marcas</a></li>
                <li><a href="#" onclick="loadContent('produtos', this)" class="nav-link text-success">Produtos</a></li>
                <li><a href="#" onclick="loadContent('embalagens', this)" class="nav-link text-success">Embalagens</a></li>
                <li><a href="#" onclick="loadContent('secoes', this)" class="nav-link text-success">Seções</a></li>
            </ul>
            <hr>
            <!-- Dropdown Usuário -->
            <div class="dropdown">
                <p><b>ID NOME</b></p>
                <p>{{$user->id}} {{$user->name}}</p>
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownUser2">
                    <li>
                        <form class="d-inline" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item text-danger" type="submit">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Conteúdo Dinâmico -->
        <div id="content" class="p-4" style="flex-grow: 1;">
            <h2>Bem-vindo ao Painel Administrativo</h2>
            <p>Selecione uma opção no menu para começar.</p>
        </div>
    </div>

    <script>
        function loadContent(page, element) {
            fetch(`/admin/${page}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('content').innerHTML = html;
                    setActiveMenuItem(element);
                })
                .catch(error => console.error('Erro ao carregar a página:', error));
        }
        
        function setActiveMenuItem(selectedItem) {
            document.querySelectorAll('#sidebar-menu .nav-link').forEach(item => {
                item.classList.remove('active', 'bg-success', 'text-white');
                item.classList.add('text-success');
            });
            selectedItem.classList.add('active', 'bg-success', 'text-white');
            selectedItem.classList.remove('text-success');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
