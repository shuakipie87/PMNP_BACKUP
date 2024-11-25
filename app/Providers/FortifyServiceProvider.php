<?php

namespace App\Providers;

use App\Actions\Fortify\{
    CreateNewUser,
    ResetUserPassword,
    UpdateUserPassword,
    UpdateUserProfileInformation
};
use Laravel\Fortify\{
    Fortify,
    Contracts\LogoutResponse
};
use Illuminate\{
    Http\Request,
    Cache\RateLimiting\Limit,
    Support\Facades\RateLimiter,
    Support\Facades\Config,
    Support\ServiceProvider,
    Support\Str
};

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
            public function toResponse($request) {
                return redirect()->route('login');
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Fortify::createUsersUsing(CreateNewUser::class);
        //Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        //Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        //Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

         # Login View
        Fortify::loginView(function () {
            return view('admin.login');
        });

        # Register
        // Fortify::registerView(function(Request $request) {
        //     $page = $request->get('page', false);
        //     $facility_location = Config::get('location.health-care-facility');
        //     return view('admin.register', compact('facility_location', 'page'));
        // });

        # Password Confirm View
        Fortify::confirmPasswordView(function() {
            return view('admin.profiles.confirm-password');
        });

        # Two Factor Challenge View
        Fortify::twoFactorChallengeView(function(Request $request) {
            $recovery = $request->get('recovery', false);
            return view('admin.two-factor-challenge', compact('recovery'));
        });
    }

    public function toResponse($request): JsonResponse
    {
        $this->guard->logout(); // logs out the session
        session()->flash('success', 'We sent a verification code to you. Please verify your email to access your account.');

        return $request->wantsJson()
            ? new JsonResponse('', 201)
            : redirect()->route('login');
    }
}
