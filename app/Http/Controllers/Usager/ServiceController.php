<?php

namespace App\Http\Controllers\Usager;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->get();
        return view('usager.services', compact('services'));
    }
}
