<?php

namespace App\Http\Controllers\Admin;

use App\Http\{
    Requests\UserRequest,
    Requests\Admin\AdminLoginRequest,
    Resources\UserResource,
    Resources\UserCollection,
    Controllers\Controller
};
use App\{
    Services\UserAuthService,
    Services\DashboardSidebarService,
    Services\RegisterSessionService,
    Models\User
};
use Illuminate\{
    Http\Request,
    Http\RedirectResponse,
    Support\Facades\Auth,
    Support\Facades\Hash,
    Support\Facades\Http,
    Validation\ValidationException
};
use Fx3costa\LaravelChartjs\Facades\Chartjs;

class AdminController extends Controller
{
    /**
     * instances construct parents
     * 
     * @access public
     * 
     * @param UserAuthService $user_service
     * @param RegisterSessionService $register_service
     * 
     * @return mixed<int|string, mixed>
     */
    public function __construct (
        public UserAuthService $user_service,
        public RegisterSessionService $register_service
    ) {}

    /**
     * Display a admin of the resource.
     * 
     * @access public
     * 
     * @return mixed<int|string, mixed>
     */
    public function admin (): mixed {
        // return $this->login();
    }

    /**
     * Display a login of the resource.
     * 
     * @access public
     * 
     * @return mixed<int|string, mixed>
     */
    public function login (): mixed 
    {
        $param = [
            'body_class' => ''
        ];

        return view('admin.login', compact('param'))->withTitle('Login');
    }

    /**
     * Execute a login of the resource.
     * 
     * @access public
     * 
     * @param App\Http\Request\Admin\AdminLoginRequest $request
     * 
     * @return mixed<int|string, mixed>
     */
    public function execute (AdminLoginRequest $request): mixed 
    {
        // user where => email
        $user = User::where([
            'email' => trim($request->safe()->email)
        ])->first();

        // hash check
        if (!$user || !Hash::check($request->safe()->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // method POST
        if ($request->isMethod('post')) // execute
        {
            // auth
            Auth::guard(User::ADMIN)->login($user);

            // redirect
            return redirect()->route('admin.dashboard');
        }

        // response
        return $this->login();
    }

    /**
     * Display a dashboard of the resource.
     * 
     * @access public
     * 
     * @param \Request $request
     * @param $region default null
     * @param $province default null
     * @param $municipality default null
     * @param $year default null
     * 
     * @return mixed<int|string, mixed>
     */
    public function dashboard (Request $request, DashboardSidebarService $service, string $region=null, string $province=null, string $municipality=null, string $year=null): mixed 
    {
        // dd(Auth::guard(User::ADMIN)->user());
        // dd(app()->chartjs);

        $query_data = [
            'region' => $request->input('region') ?? $region,
            'province' => $request->input('province') ?? $province, 
            'municipality' => $request->input('municipality') ?? $municipality,
            'year' => $request->input('year') ?? $year
        ];

        // line -> chart
        $line_chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels([
                'January', 
                'February', 
                'March', 
                'April', 
                'May', 
                'June', 
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ])
            ->datasets([
                [
                    "label" => "My First dataset",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [65, 59, 80, 81, 56, 55, 40],
                ],
                [
                    "label" => "My Second dataset",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [12, 33, 44, 44, 55, 23, 40],
                ]
            ])
            ->options([]);

        $default_data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        
        // bar -> chart
        $bar_chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels([
                'January', 
                'February', 
                'March', 
                'April', 
                'May', 
                'June', 
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ])
            ->datasets([
                [
                    "label" => "data (1)",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'green'],
                    'data' => [69, 59]
                ],
                [
                    "label" => "data (2)",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
                    'data' => [65, 12]
                ],
                [
                    "label" => "data (3)",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
                    'data' => [47, 17]
                ]
            ])
            ->options([]);

        // polarArea -> chart [test]
        $polar_chartjs = app()->chartjs
            ->name('polarChartTest')
            ->type('polarArea')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Label x', 'Label y'])
            ->datasets([
                [
                    "label" => "data (1)",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    'data' => [69, 59]
                ],
                [
                    "label" => "data (2)",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
                    'data' => [65, 12]
                ]
            ])
            ->options([]);

        // scatter -> chart [test]
        $scatter_chartjs = app()->chartjs
            ->name('scatterChartTest')
            ->type('scatter')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Label x', 'Label y'])
            ->datasets([
                [
                    "label" => "data (1)",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    'data' => [69, 59]
                ],
                [
                    "label" => "data (2)",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
                    'data' => [65, 12]
                ]
            ])
            ->options([]);

        // method GET
        if ($request->isMethod('post')) // execute
        {
            // redirect
            return redirect()->route('admin.dashboard.search', $query_data);   
        }

        $param = [
            'body_class' => 'hold-transition sidebar-mini',
            'user' => [
                'name' => ''
            ]
        ];

        $name = Auth::guard(User::ADMIN)->user()->name;

        return view(
            'admin.index', 
            compact('name', 'line_chartjs', 'bar_chartjs', 'polar_chartjs', 'scatter_chartjs', 'query_data')
        )->withTitle('Dashboard');
    }

    /**
     * Execute a dashboard search of the resource.
     * 
     * @access public
     * 
     * @param $region default null
     * @param $province default null
     * @param $municipality default null
     * @param $year default null
     * 
     * @param \Request $request
     * 
     * @return mixed<int|string, mixed>
     */
    public function search (string $region=null, string $province=null, string $municipality=null, string $year=null, Request $request, DashboardSidebarService $service): mixed {
        return $this->dashboard($request, $service, $region, $province, $municipality, $year);
    }

    /**
     * Display a profile of the resource.
     * 
     * @access public
     * 
     * @param App\Http\Request\UserRequest $request
     * 
     * @return mixed<int|string, mixed>
     */
    public function profile (): mixed 
    {
        // dd(Auth::guard(User::ADMIN)->user());

        $param = [
            'body_class' => 'hold-transition sidebar-mini',
            'user' => [
                'name' => ''
            ]
        ];

        $name = Auth::guard(User::ADMIN)->user()->name;
        $query_row = User::getData(Auth::guard(User::ADMIN)->user()->id);

        return view('admin.profiles.index', compact('name', 'query_row'))->withTitle('Profile');
    }

    /**
     * Log the user out of the application.
     * 
     * @access public
     * 
     * @param \Request $request
     * 
     * @return \RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $this->register_service->removeDataSession();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
}
