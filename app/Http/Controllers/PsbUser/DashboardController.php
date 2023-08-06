<?php

namespace App\Http\Controllers\PsbUser;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('psb-user.dashboard');
    }
}
