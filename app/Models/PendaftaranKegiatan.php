<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranKegiatan extends Model
{
    protected $table = 'pendaftaran_kegiatan';
    
    protected $fillable = [
        'kegiatan_id',
        'nama_lengkap',
        'email',
        'no_hp',
        'alamat',
        'instansi',
        'alasan',
        'status',
        'hadir',
        'waktu_hadir',
        'qr_token',
        'nomor_urut',
        'catatan_admin',
    ];

    protected $casts = [
        'hadir' => 'boolean',
        'waktu_hadir' => 'datetime',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function generateQRToken()
    {
        $this->qr_token = bin2hex(random_bytes(32));
        $this->save();
        return $this->qr_token;
    }

    public function checkIn()
    {
        $this->hadir = true;
        $this->waktu_hadir = now();
        $this->save();
    }
}
