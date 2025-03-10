<?php

namespace App\Models;

use App\Models\Sidang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        // Relasi ke Sidang
        public function sidangs()
        {
            return $this->hasMany(Sidang::class);
        }
}
