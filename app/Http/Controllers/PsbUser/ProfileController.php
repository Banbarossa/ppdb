<?php

namespace App\Http\Controllers\PsbUser;

use App\Http\Controllers\Controller;
use App\Models\NewStudent;
use App\Models\User;
use App\Traits\AgamaTrait;
use App\Traits\GolonganDarahTrait;

class ProfileController extends Controller
{
    use AgamaTrait;
    use GolonganDarahTrait;

    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        if ($user->level_pendaftaran < 4) {
            return view('psb-user.pendaftaran-wizard');

        }
        $title = "Profil Siswa";
        $data = NewStudent::where('user_id', auth()->user()->id)->first();
        return view('psb-user.show-profile-1', ['data' => $data, 'title' => $title]);

    }

    public function edit($id)
    {
        return view('psb-user.pendaftaran-wizard');
    }
}
