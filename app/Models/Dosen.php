<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function dosen_pembimbing()
    {
        return $this->hasMany(DosenPembimbing::class, 'dosen_id', 'id');
    }
    public function dosen_penguji()
    {
        return $this->hasMany(DosenPenguji::class, 'dosen_id', 'id');
    }
    public function mahasiswa_bimbingan()
    {
        return $this->hasMany(MahasiswaBimbingan::class, 'dosen_id', 'id');
    }
    public function jadbim()
    {
        return $this->hasMany(JadwalBimbingan::class, 'dosen_id', 'id');
    }
    public function kaprodi()
    {
        return $this->hasMany(Kaprodi::class, 'dosen_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
    public function keilmuan()
    {
        return $this->belongsTo(Keilmuan::class, 'keilmuan_id', 'id');
    }

    public static function boot(){
        parent::boot();
        self::deleting(function($var){
            if ($var->dosen_pembimbing->count() > 0 || $var->dosen_penguji->count() > 0){
            return false;
            }
        });
    }

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->firstOrFail();
    }
}
