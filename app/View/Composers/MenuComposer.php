<?php
 
namespace App\View\Composers;
 
// use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\{
    Services\DashboardSidebarService, 
    Models\User 
};
use Illuminate\{
    Support\Facades\Auth,
};

 
class MenuComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
        public DashboardSidebarService $service,
    ) {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view, ): void
    {
        $menu = $this->service->dashboardConfig(Auth::guard(User::ADMIN)->user()->role);

        $view->with('sidemenu', $menu);
        $view->with('sidemenu_active_route', 'demographics-socio-economic-profiles');
    }
}