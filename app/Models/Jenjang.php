<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    use HasUuids;

    public function newStudents()
    {
        return $this->hasMany(NewStudent::class);
    }
}
