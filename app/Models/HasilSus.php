<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSus extends Model
{
    use HasFactory;

    protected $table = 'hasil_sus';

    protected $fillable = [
        'nama',
        'email',
        'usia',
        'pendidikan',
        'pengalaman_komputer',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7',
        'q8',
        'q9',
        'q10',
        'total_score',
        'sus_score',
    ];

    protected $casts = [
        'q1' => 'integer',
        'q2' => 'integer',
        'q3' => 'integer',
        'q4' => 'integer',
        'q5' => 'integer',
        'q6' => 'integer',
        'q7' => 'integer',
        'q8' => 'integer',
        'q9' => 'integer',
        'q10' => 'integer',
        'total_score' => 'float',
        'sus_score' => 'float',
    ];

    /**
     * Mendapatkan kategori berdasarkan skor SUS
     */
    public function getKategoriAttribute()
    {
        $score = $this->sus_score;

        if ($score >= 80.3) {
            return [
                'grade' => 'A',
                'label' => 'Excellent',
                'color' => 'success',
            ];
        } elseif ($score >= 68) {
            return [
                'grade' => 'B',
                'label' => 'Good',
                'color' => 'info',
            ];
        } elseif ($score >= 51) {
            return [
                'grade' => 'D',
                'label' => 'Poor',
                'color' => 'warning',
            ];
        } else {
            return [
                'grade' => 'F',
                'label' => 'Worst',
                'color' => 'danger',
            ];
        }
    }

    /**
     * Mendapatkan array pertanyaan SUS
     */
    public static function getPertanyaanSus()
    {
        return [
            1 => 'Saya ingin menggunakan sistem ini sering',
            2 => 'Saya merasa sistem ini sulit digunakan',
            3 => 'Saya merasa sistem ini mudah digunakan',
            4 => 'Saya membutuhkan bantuan orang lain untuk menggunakan sistem ini',
            5 => 'Saya merasa fitur-fitur sistem berjalan dengan baik',
            6 => 'Saya merasa ada banyak hal yang tidak konsisten',
            7 => 'Saya merasa orang lain akan memahami cara menggunakan sistem ini dengan cepat',
            8 => 'Saya merasa sistem ini membingungkan',
            9 => 'Saya merasa percaya diri menggunakan sistem ini',
            10 => 'Saya perlu belajar banyak sebelum bisa menggunakan sistem ini',
        ];
    }
}
