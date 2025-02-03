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
<body class="text-center">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="form-signin">
        <img src="storage/images/carrinhoEconomico.png" class="mb-4" alt="Logo Image" width="100">
        <h1 class="h3 mb-3 font-weight-normal">Bem-vindo de volta</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!--Email Address -->
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!--Password -->
            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Senha"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!-- Remember Me -->
            <div class="mb-3 form-check text-start">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
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
        </form>
    </div>
</body>
</html>
