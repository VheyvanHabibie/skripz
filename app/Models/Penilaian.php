<?php

namespace App\Models;

use App\Models\Sidang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penilaian extends Model
{
    use HasFactory;
    protected $guarded = [];
    // Relasi ke Sidang
    public function sidangs()
    {
        return $this->hasMany(Sidang::class);
    }
}
