<?php

namespace App\Http\Controllers\PsbUser;

use App\Http\Controllers\Controller;
use App\Models\NewStudent;
use Barryvdh\DomPDF\Facade\Pdf;

class KartuUjianController extends Controller
{
    public function index()
    {

        $data = NewStudent::where('user_id', auth()->user()->id)->first();
        $pdf = Pdf::loadView('psb-user.kartuUjian', ['data' => $data]);
        return $pdf->download('kartu-ujian.pdf');

    }
}
