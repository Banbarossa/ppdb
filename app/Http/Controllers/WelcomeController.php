<?php

namespace App\Http\Controllers;

use App\Models\JalurMasuk;

class WelcomeController extends Controller
{
    public function index()
    {

        $model = JalurMasuk::all();
        return view('welcome', compact('model'));
    }
}
