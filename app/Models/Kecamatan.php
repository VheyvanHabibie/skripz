<?php

namespace App\Models;

use App\Models\Kelurahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class);
    }
}
