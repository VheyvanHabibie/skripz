<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSeminar extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
    public function dospeng()
    {
        return $this->belongsTo(DosenPenguji::class, 'dosen_penguji_id', 'id');
    }
}
