<?php

namespace App\Models;

use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kabupatens()
    {
        return $this->hasMany(Kabupaten::class);
    }
}
