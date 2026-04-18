<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StatsService;

class StatsController extends Controller
{
    public function index(StatsService $statsService)
    {
        $stats = $statsService->getDayStats();
        return view('admin.dashboard', compact('stats'));
    }
}
