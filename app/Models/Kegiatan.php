<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'jenis_kegiatan',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'penanggung_jawab',
        'jumlah_peserta',
        'kuota_peserta',
        'foto',
        'status',
        'is_pendaftaran_open',
        'qr_token',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'is_pendaftaran_open' => 'boolean',
    ];

    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(PendaftaranKegiatan::class);
    }

    public function pendaftaranApproved()
    {
        return $this->hasMany(PendaftaranKegiatan::class)->where('status', 'approved');
    }

    public function pendaftaranPending()
    {
        return $this->hasMany(PendaftaranKegiatan::class)->where('status', 'pending');
    }

    public function isFull()
    {
        if (!$this->kuota_peserta) {
            return false;
        }
        return $this->pendaftaranApproved()->count() >= $this->kuota_peserta;
    }

    public function sisaKuota()
    {
        if (!$this->kuota_peserta) {
            return null;
        }
        return $this->kuota_peserta - $this->pendaftaranApproved()->count();
    }

    public function generateQRToken()
    {
        $this->qr_token = bin2hex(random_bytes(32));
        $this->save();
        return $this->qr_token;
    }
}
