<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar | {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/storage/images/carrinhoEconomico.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/storage/css/login.css" rel="stylesheet">
</head>
<body class="text-center">
    <div class="form-signin">
        <a href="/">
            <img src="storage/images/carrinhoEconomico.png" class="mb-4" alt="Logo Image" width="100">
        </a>
        <h1 class="h3 mb-3 font-weight-normal">Cadastrar</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <x-text-input id="name" class="form-control my-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{ __('Name') }}"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            

            <!-- Email Address -->
            <x-text-input id="email" class="form-control my-2" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="{{ __('Email') }}"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!-- Password -->
            <x-text-input id="password" class="form-control my-2" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!-- Confirm Password -->
            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            <div class="d-flex justify-content-between align-items-center">
                <a class="link-success" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="btn btn-success">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>
