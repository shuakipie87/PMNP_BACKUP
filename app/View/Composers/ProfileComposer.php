<?php
 
namespace App\View\Composers;
 
// use App\Repositories\UserRepository;
use Illuminate\View\View;
 
class ProfileComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
        public Request $request 
        // protected UserRepository $users,
    ) {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {

        $view->with('composer_login_email', 'charly');
    }
}