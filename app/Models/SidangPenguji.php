<?php

namespace App\Models;

use App\Models\Dosen;
use App\Models\Sidang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SidangPenguji extends Model
{
    use HasFactory;
    protected $guarded = [];
    // Relasi ke Sidang
    public function sidang()
    {
        return $this->belongsTo(Sidang::class);
    }

    // Relasi ke Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
