<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keilmuan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'keilmuan_id', 'id');
    }
    public function topik()
    {
        return $this->hasMany(TopikSkripsi::class, 'keilmuan_id', 'id');
    }
    public function kelilmuan()
    {
        return $this->hasMany(KelompokKeilmuan::class, 'keilmuan_id', 'id');
    }
}
