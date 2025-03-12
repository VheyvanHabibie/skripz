<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanProposal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function dospem()
    {
        return $this->belongsTo(DosenPembimbing::class, 'dosen_pembimbing_id', 'id');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
}
