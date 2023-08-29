<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkaspsb extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function newStudent()
    {
        return $this->belongsTo(NewStudent::class);
    }
}
