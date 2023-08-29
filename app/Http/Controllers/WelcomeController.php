<?php

namespace App\Http\Controllers;

use App\Models\JalurMasuk;

class WelcomeController extends Controller
{
    public function index()
    {

        $model = JalurMasuk::where('status', true)->get();
        return view('welcome', compact('model'));
    }

    public function show($id)
    {
        $tanggalSekarang = now()->format('Y-m-d');
        $data = JalurMasuk::findOrFail($id);

        $all = JalurMasuk::where('status', true)->get();
        return view('post',
            [
                'tanggalSekarang' => $tanggalSekarang,
                'data' => $data,
                'all' => $all,
            ]);
    }
}
