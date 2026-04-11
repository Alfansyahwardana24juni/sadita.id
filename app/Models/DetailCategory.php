<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class DetailCategory extends Model
{
    use HasFactory;

    protected $fillable = [
    'category_id',
    'title',
    'title_en',
    'description',
    'description_en',
    'img',
    'slug'
];


    protected static function booted()
    {
        static::creating(function ($detail) {
            $slug = Str::slug($detail->title);
            $count = DetailCategory::where('slug', 'like', "{$slug}%")->count();
            $detail->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'detail_category_id');
    }
}