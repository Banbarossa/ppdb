<?php

namespace App\Http\Controllers;

use App\Models\ContactPsb;
use App\Models\JalurMasuk;
use App\Models\PhonePsb;
use App\Traits\ActiveYearTrait;

class WelcomeController extends Controller
{
    use ActiveYearTrait;
    public function index()
    {
        $model = JalurMasuk::where('status', true)->get();
        $phone = PhonePsb::all();
        $media = ContactPsb::all();
        $tahun = $this->getActiveYear();

        return view('welcome', [
            'model' => $model,
            'phone' => $phone,
            'media' => $media,
            'tahun' => $tahun,
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
