<?php

namespace App\Http\Controllers;

use App\Events\DashboardUpdated;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    // Dashboard view
    public function index()
    {
        // Get the dashboard data from the service
        $data = $this->dashboardService->getDashboardData();
        // Return the dashboard view with the data
        return view('admin.dashboard.index', compact('data'));
    }
}

