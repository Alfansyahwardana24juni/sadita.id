<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'detail_category_id',
    'name',
    'name_en',
    'slug',
    'price',
    'list_image',
    'image_top',
    'image_top_en',
    'image_bottom',
    'image_bottom_en',
    'alt_top',
    'alt_top_en',
    'alt_bottom',
    'alt_bottom_en',
    'aktif', // ✅ tambahan

];


    
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }
    
    // Relasi ke DetailCategory
    public function detailCategory()
    {
        return $this->belongsTo(DetailCategory::class, 'detail_category_id');
    }
    
    // Relasi ke Category melalui DetailCategory
    public function category()
    {
        return $this->hasOneThrough(
            CategoryProduct::class,
            DetailCategory::class,
            'id', // Foreign key di detail_categories
            'id', // Foreign key di category_products
            'detail_category_id', // Local key di products
            'category_id' // Local key di detail_categories
        );
    }
}