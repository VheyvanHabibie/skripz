<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberReferensi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function topik()
    {
        return $this->hasMany(TopikSkripsi::class, 'keilmuan_id', 'id');
    }
}
