<?php

namespace App\Models;

use App\Models\Fitur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AkunStatus extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function features()
    {
        return $this->belongsToMany(Fitur::class, 'fitur_akuns', 'akun_id', 'fitur_id')
        ->withPivot('limit');
    }

    public function hasFeature($key)
    {
        return $this->features()->where('key', $key)->exists();
    }

    public function getFeatureLimit($key)
    {
        $fitur = $this->features()->where('key', $key)->first();

        return $fitur ? $fitur->pivot->limit : null;
    }
}
