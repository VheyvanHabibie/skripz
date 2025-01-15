<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'jabatan_id', 'id');
    }
    public function sekretariat()
    {
        return $this->hasMany(Sekretariat::class, 'jabatan_id', 'id');
    }
    public static function boot(){
        parent::boot();
        self::deleting(function($var){
            if ($var->dosen->count() > 0 | $var->sekretariat->count() > 0){
            return false;
            }
        });
    }
}
