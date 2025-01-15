<?php

namespace App\Models;

use App\Models\ManajemenLangganan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function langganan()
    {
        return $this->hasMany(ManajemenLangganan::class, 'paket_id', 'id');
    }

}
