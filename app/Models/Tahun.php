<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function newStudents()
    {
        return $this->hasMany(NewStudent::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function search($query)
    {
        return self::where('tahun', 'LIKE', '%' . $query . '%')->paginate();
    }

}
