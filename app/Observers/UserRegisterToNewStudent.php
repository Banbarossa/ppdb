<?php

namespace App\Observers;

use App\Models\NewStudent;
use App\Models\Tahun;
use App\Models\user;

class UserRegisterToNewStudent
{
    /**
     * Handle the user "created" event.
     */
    public function created(user $user): void
    {

        $tahun_id = Tahun::where('status', 'aktif')->first();
        $jumlah_user = User::all()->count();
        $no_pendaftaran = substr($tahun_id->tahun, -4) . '-' . str_pad($jumlah_user + 1, 3, '0', STR_PAD_LEFT);
        $newStudent = NewStudent::create([

            'user_id' => $user->id,
            'nama' => $user->name,
            'no_pendaftaran' => $no_pendaftaran,
            'tahun_id' => $tahun_id->id,
            'no_hp' => $user,
            'jenjang' => $request->jenjang,
            'jalur_masuk' => $jalur_masuk,
            'biaya_pendaftaran' => $biaya_pendaftaran,
        ]);
    }

    /**
     * Handle the user "updated" event.
     */
    public function updated(user $user): void
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     */
    public function deleted(user $user): void
    {
        //
    }

    /**
     * Handle the user "restored" event.
     */
    public function restored(user $user): void
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     */
    public function forceDeleted(user $user): void
    {
        //
    }
}
