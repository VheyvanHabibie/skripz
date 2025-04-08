<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Task;
use App\Models\Dosen;
use App\Models\Mitra;
use App\Models\Status;
use App\Models\Kaprodi;
use App\Models\Mahasiswa;
use App\Models\AkunStatus;
use App\Models\Penjadwalan;
use App\Models\Sekretariat;
use App\Models\LaporanYudisium;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ManajemenLangganan;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'pts_id',
        'foto',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function yudisium()
    {
        return $this->belongsTo(LaporanYudisium::class, 'mahasiswa_id', 'id');
    }
    public function penjadwalan()
    {
        return $this->belongsTo(Penjadwalan::class, 'mahasiswa_id', 'id');
    }
    protected static function booted()
    {
        static::created(function ($user) {
            // Create default statuses
            $user->statuses()->createMany([
                [
                    'title' => 'Backlog',
                    'slug' => 'backlog',
                    'order' => 1
                ],
                [
                    'title' => 'Up Next',
                    'slug' => 'up-next',
                    'order' => 2
                ],
                [
                    'title' => 'In Progress',
                    'slug' => 'in-progress',
                    'order' => 3
                ],
                [
                    'title' => 'Done',
                    'slug' => 'done',
                    'order' => 4
                ]
            ]);
        });
    }

    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('order');
    }

    public function statuses()
    {
        return $this->hasMany(Status::class)->orderBy('order');
    }
    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'user_id', 'id');
    }
    public function sekretariat()
    {
        return $this->hasOne(Sekretariat::class, 'user_id', 'id');
    }
    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'user_id', 'id');
    }
    public function mitra()
    {
        return $this->hasOne(Mitra::class, 'user_id', 'id');
    }
    public function kaprodi()
    {
        return $this->hasOne(Kaprodi::class, 'user_id', 'id');
    }

    public function langganan()
    {
        return $this->hasMany(ManajemenLangganan::class, 'user_id', 'id');
    }
    public function plan()
    {
        return $this->belongsTo(AkunStatus::class, 'akun_status_id', 'id');
    }
}
