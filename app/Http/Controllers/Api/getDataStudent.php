<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NewStudent;
use Illuminate\Http\Request;

class getDataStudent extends Controller
{
    public function getOne(Request $request)
    {
        $student = NewStudent::where('nisn', $request->nisn)->first();
        if ($student) {
            return response()->json(['data' => $student], 200);
        } else {
            return response()->json(['data' => 'Data tidak ditemukan'], 404);
        }
    }
}
