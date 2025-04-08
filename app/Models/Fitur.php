<?php

namespace App\Models;

use App\Models\AkunStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fitur extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function plans()
    {
        return $this->belongsToMany(AkunStatus::class, 'fitur_akuns')
                    ->withPivot('limit')
                    ->withTimestamps();
    }
}
