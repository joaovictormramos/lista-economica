<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo de volta | {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/storage/images/carrinhoEconomico.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/storage/css/login.css" rel="stylesheet">
</head>
<<<<<<< HEAD
<body class="container">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Exibição de erro no topo -->
    @if(session('error'))
    <div class="alert alert-danger mb-3">
        {{ session('error') }}
    </div>
    @endif

=======
<body class="text-center">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

>>>>>>> de8416387bf0cdb0102ba5933b1dc1893152d16c
    <div class="form-signin">
        <img src="storage/images/carrinhoEconomico.png" class="mb-4" alt="Logo Image" width="100">
        <h1 class="h3 mb-3 font-weight-normal">Bem-vindo de volta</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
<<<<<<< HEAD
            <!-- Email Address -->
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!-- Password -->
=======
            <!--Email Address -->
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!--Password -->
>>>>>>> de8416387bf0cdb0102ba5933b1dc1893152d16c
            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Senha"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!-- Remember Me -->
            <div class="mb-3 form-check text-start">
<<<<<<< HEAD
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
=======
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
>>>>>>> de8416387bf0cdb0102ba5933b1dc1893152d16c
                <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                <a class="link-success" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-primary-button class="btn btn-success">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
<<<<<<< HEAD

            <div class="align-items-center mt-2">
                <a href="{{ route('auth', ['provider' => 'google']) }}" class="btn btn-primary d-flex align-items-center justify-content-center">
                    <span class="icon me-2"></span>Entrar com Google
                </a>
            </div>
=======
>>>>>>> de8416387bf0cdb0102ba5933b1dc1893152d16c
        </form>
    </div>
</body>
</html>
