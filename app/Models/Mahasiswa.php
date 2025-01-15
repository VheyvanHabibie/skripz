<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mahbim()
    {
        return $this->belongsTo(MahasiswaBimbingan::class, 'mahasiswa_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }
    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->firstOrFail();
    }
}
