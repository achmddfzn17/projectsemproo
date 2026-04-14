<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'kegiatan_id',
        'nama_kegiatan',
        'judul',
        'deskripsi',
        'foto',
        'urutan',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset($this->foto);
        }

        return null;
    }
}
