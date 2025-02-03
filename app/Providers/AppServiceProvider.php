<?php

namespace App\Providers;

use App\Models\Lister;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
	if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
    	}

        View::composer('*', function ($view) {
            // Carrega as listas do usuário autenticado
            $user = auth()->user();
            $lists = $user ? Lister::with('products')->where('user_id', $user->id)->get() : collect();
            $view->with('lists', $lists);
        });
    }
}
