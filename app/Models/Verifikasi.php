<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'verifikasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_siswa',
        'nomor_pendaftaran',
        'tanggal_daftar',
        'jawaban_pertanyaan_1',
        'jawaban_pertanyaan_2',
        'jawaban_pertanyaan_3',
        'jawaban_pertanyaan_4',
        'jawaban_pertanyaan_5',
        'status',
        'pengumuman',
    ];

    // Relasi dengan model Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
