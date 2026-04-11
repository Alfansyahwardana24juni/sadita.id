<?php
// app/Models/AdminKantor.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminKantor extends Model
{
    use HasFactory;

    protected $table = 'admin_kantor';
    
    protected $fillable = [
        'nama_admin',
        'hari_kerja',
        'lokasi_admin',
        'nomor_telepon',
        'img',
        'default_message',
    ];

    public function chats()
    {
        return $this->morphMany(Chat::class, 'pengirim');
    }
}