<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
  protected $fillable = [
    'judul', 'judul_en',
    'slug', 'thumbnail',
    'konten', 'konten_en',
    'tanggal_publikasi',
    'category', 'penulis', // <-- tambahkan ini
    'created_at', 'updated_at'
];


public function getDisplayJudulAttribute()
{
    return app()->getLocale() === 'en' && $this->judul_en ? $this->judul_en : $this->judul;
}

public function getDisplayKontenAttribute()
{
    return app()->getLocale() === 'en' && $this->konten_en ? $this->konten_en : $this->konten;
}

    protected $casts = [
        'tanggal_publikasi' => 'datetime',
    ];


protected static function boot()
{
    parent::boot();
    
    static::creating(function ($article) {
        $article->slug = Str::slug($article->judul);
    });
}
}