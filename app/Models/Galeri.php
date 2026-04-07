<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    
    protected $fillable = [
        'kegiatan_id',
        'judul',
        'deskripsi',
        'foto',
        'urutan',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
