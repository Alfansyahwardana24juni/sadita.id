<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class DetailCategoryController extends Controller
{
    public function show($slug)
    {
        $category = CategoryProduct::where('slug', $slug)->firstOrFail();

        $detailCategory = $category->detailCategories()->with('products')->first();

        // Ganti field sesuai bahasa
        $locale = app()->getLocale();

        $detailCategory->title = $locale === 'en' && $detailCategory->title_en ? $detailCategory->title_en : $detailCategory->title;
        $detailCategory->description = $locale === 'en' && $detailCategory->description_en ? $detailCategory->description_en : $detailCategory->description;

        // Set juga nama produk
        foreach ($detailCategory->products as $product) {
            $product->name = $locale === 'en' && $product->name_en ? $product->name_en : $product->name;
            $product->image_top = $locale === 'en' && $product->image_top_en ? $product->image_top_en : $product->image_top;
            $product->image_bottom = $locale === 'en' && $product->image_bottom_en ? $product->image_bottom_en : $product->image_bottom;
        }

        return view('detailcategory', compact('category', 'detailCategory'));
    }
}
