<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterHewan extends Model
{
    use HasFactory;

    protected $table = 'dokter_hewan';
    
    protected $fillable = [
        'nama_dokter',
        'pengalaman',
        'lokasi_praktik',
        'nomor_telepon',
        'img',
        'default_message',
    ];

    public function chats()
    {
        return $this->morphMany(Chat::class, 'pengirim');
    }
}