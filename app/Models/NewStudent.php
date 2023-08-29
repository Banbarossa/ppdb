<?php

namespace App\Models;

use App\Models\Berkaspsb;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewStudent extends Model
{
    use HasFactory;
    protected $guarded = [''];
    use HasUuids;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

    public function berkasPsb()
    {
        return $this->hasOne(Berkaspsb::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

}
