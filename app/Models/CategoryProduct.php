<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class CategoryProduct extends Model
{
    use HasFactory;

   protected $fillable = [
    'name_category',
    'name_category_en',
    'img',
    'slug'
];


    public static function boot()
    {
        parent::boot();
        
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name_category);
        });
    }
    public function detailCategories(): HasMany
    {
        return $this->hasMany(DetailCategory::class, 'category_id');
    }

    public function products()
{
    return $this->hasManyThrough(
        Product::class, 
        DetailCategory::class,
        'category_id', // Foreign key di detail_categories
        'detail_category_id', // Foreign key di products (sesuai relasi di model DetailCategory)
        'id', // Local key di category_products
        'id' // Local key di detail_categories
    );
}
}