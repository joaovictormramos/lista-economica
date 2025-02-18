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
    <div class="form-signin">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <img src="storage/images/carrinhoEconomico.png" class="mb-4" alt="Logo Image" width="100">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="{{ __('Email')}}"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="btn btn-success">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>    
</body>
</html>
