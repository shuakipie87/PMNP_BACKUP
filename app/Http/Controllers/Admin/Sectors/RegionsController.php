<?php

namespace App\Http\Controllers\Admin\Sectors;

use App\Http\Controllers\Controller;
use App\{
    Services\UserAuthService,
    Models\User,
    Models\Master\Regions
};
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    /**
     * Display a admin of the resource.
     * 
     * @access public
     * 
     * @return mixed<int|string, mixed>
     */
    public function index (): mixed {

        $regions = Regions::query()->get();

        return view('admin.sectors.regions', compact('regions'))->withTitle('Regions');
    }
}
