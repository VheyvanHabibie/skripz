<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokKeilmuan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function keilmuan()
    {
        return $this->belongsTo(Keilmuan::class, 'keilmuan_id', 'id');
    }
}
