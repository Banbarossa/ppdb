<?php

namespace App\Http\Controllers\PsbUser;

use App\Http\Controllers\Controller;
use App\Models\NewStudent;

class DashboardController extends Controller
{
    public function index()
    {

        // dd(auth()->user()->id);
        $data = NewStudent::with('jenjang')->where('user_id', auth()->user()->id)->first();

        return view('psb-user.dashboard', ['data' => $data]);
    }
}
