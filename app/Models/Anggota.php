<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Anggota extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'anggota';

    protected $fillable = [
        'nama',
        'username',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'email',
        'password',
        'foto_profil',
        'pendidikan_terakhir',
        'pekerjaan',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function getUmurAttribute()
    {
        return $this->tanggal_lahir->age;
    }

    public function pendaftaranKegiatan()
    {
        return $this->hasMany(PendaftaranKegiatan::class, 'email', 'email');
    }
}
