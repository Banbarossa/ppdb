<?php

namespace App\Http\Controllers;

use App\Models\ContactPsb;
use App\Models\JalurMasuk;
use App\Models\PhonePsb;

class WelcomeController extends Controller
{
    public function index()
    {
        $model = JalurMasuk::where('status', true)->get();
        $phone = PhonePsb::all();
        $media = ContactPsb::all();

        return view('welcome', [
            'model' => $model,
            'phone' => $phone,
            'media' => $media,
        ]);
    }

    public function show($id)
    {
        $tanggalSekarang = now()->format('Y-m-d');
        $data = JalurMasuk::findOrFail($id);

        $all = JalurMasuk::where('status', true)->where('id', '!=', $id)->get();
        $phone = PhonePsb::all();
        $media = ContactPsb::all();
        return view('post',
            [
                'tanggalSekarang' => $tanggalSekarang,
                'data' => $data,
                'all' => $all,
                'phone' => $phone,
                'media' => $media,
            ]);
    }
}
