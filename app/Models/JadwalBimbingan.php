<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalBimbingan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mahbim()
    {
        return $this->belongsTo(MahasiswaBimbingan::class, 'mahbim_id', 'id');
    }
    public function dospem()
    {
        return $this->belongsTo(DosenPembimbing::class, 'dosen_id', 'id');
    }
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang_id', 'id');
    }
}
