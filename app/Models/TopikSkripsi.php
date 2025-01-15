<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopikSkripsi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function keilmuan()
    {
        return $this->belongsTo(Keilmuan::class, 'keilmuan_id', 'id');
    }
    public function sumber()
    {
        return $this->belongsTo(SumberReferensi::class, 'sumber_id', 'id');
    }
}
