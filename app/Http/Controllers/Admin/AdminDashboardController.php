<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewStudent;
use App\Models\User;
use App\Traits\ActiveYearTrait;

class AdminDashboardController extends Controller
{

    use ActiveYearTrait;
    public function index()
    {
        $tahun_aktif = $this->getActiveYear()->id;

        $all = User::where('tahun_id', $tahun_aktif)->get();
        $pending = User::where('tahun_id', $tahun_aktif)
            ->where('approval', 'Pending')
            ->get();
        $aprroved = User::where('tahun_id', $tahun_aktif)
            ->where('approval', 'approved')
            ->get();
        $ditolak = User::where('tahun_id', $tahun_aktif)
            ->where('approval', 'ditolak')
            ->get();

        $user = [
            'Pendaftar' => [
                'data' => $all,
                'color' => 'primary',
                'url' => route('admin.user-register.index'),
            ],
            'Pending' => [
                'data' => $pending,
                'color' => 'warning',
                'url' => route('admin.pending.pendaftar', ['status' => 'pending']),
            ],
            'Approved' => [
                'data' => $aprroved,
                'color' => 'secondary',
                'url' => route('admin.pending.pendaftar', ['status' => 'approved']),
            ],
            'Rejected' => [
                'data' => $ditolak,
                'color' => 'danger',
                'url' => route('admin.pending.pendaftar', ['status' => 'ditolak']),
            ],
        ];

        $student = NewStudent::where('tahun_id', $tahun_aktif)->get();
        return view('admin.dashboard', [
            'user' => $user,
            'student' => $student,
        ]);
    }
}
