<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManajemenLangganan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
