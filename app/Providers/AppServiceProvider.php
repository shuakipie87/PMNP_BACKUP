<?php

namespace App\Providers;

use App\Models\{
    User,
    PersonalAccessToken
};
use App\View\Composers\{
    MenuComposer,
    ProfileComposer
};
use Illuminate\{
    Support\Facades,
    Support\ServiceProvider,
    Support\Facades\Auth,
    Support\Facades\View,
    // View\View
};
use Laravel\Sanctum\Sanctum;

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
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        // var_dump(Auth::guard(User::ADMIN)->user());

        // share login data
        View::share('login_name', 'charly');
        View::share('login_email', 'charly@email.com');

        // view composer => admin/template/navmenu/dashboard
        Facades\View::composer('admin.template.navmenu.dashboard', MenuComposer::class);

        // view composer => admin/profile
        Facades\View::composer('admin.index', ProfileComposer::class);
        
    }
}
