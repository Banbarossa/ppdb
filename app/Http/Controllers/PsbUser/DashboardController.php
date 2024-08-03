<?php

namespace App\Http\Controllers\PsbUser;

use App\Http\Controllers\Controller;
use App\Models\NewStudent;
use App\Models\PhonePsb;

class DashboardController extends Controller
{
    public function index()
    {

        $phone = PhonePsb::all();
        $data = NewStudent::with('jenjang')->where('user_id', auth()->user()->id)->first();

        return view('psb-user.dashboard', ['data' => $data, 'phone' => $phone]);
    }
}
