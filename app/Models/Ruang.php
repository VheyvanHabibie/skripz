<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function jadbim()
    {
        return $this->hasMany(JadwalBimbingan::class, 'ruang_id', 'id');
    }
    public function penjadwalan()
    {
        return $this->hasMany(Penjadwalan::class, 'ruang_id', 'id');
    }
    public static function boot(){
        parent::boot();
        self::deleting(function($var){
            if ($var->jadbim->count() > 0 || $var->penjadwalan->count() > 0){
            return false;
            }
        });
    }
}
