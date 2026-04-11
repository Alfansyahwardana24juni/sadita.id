<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Product;

class ProdukController extends Controller
{
    // ✅ Halaman semua produk
    public function tampilproduk(Request $request)
    {
        $categories = CategoryProduct::all();
        $search = $request->get('search');
        $selectedCategory = $request->get('category');

        $productsQuery = Product::query()->where('aktif', true); // hanya produk aktif

        // Filter pencarian
        if ($search) {
            $productsQuery->where(function ($query) use ($search) {
                $locale = app()->getLocale();
                $field = $locale === 'en' ? 'name_en' : 'name';
                $query->where($field, 'like', '%' . $search . '%');
            });
        }

        // Filter kategori
        if ($selectedCategory) {
            $productsQuery->whereHas('detailCategory.category', function ($query) use ($selectedCategory) {
                $query->where('slug', $selectedCategory);
            });
        }

        $products = $productsQuery->with(['detailCategory.category'])->get();

        return view('produk', compact('categories', 'products', 'search', 'selectedCategory'));
    }

    // ✅ Halaman detail produk
    public function show($categorySlug, $productSlug)
    {
        // Cari kategori berdasarkan slug
        $category = CategoryProduct::where('slug', $categorySlug)->firstOrFail();

        // Cari produk berdasarkan slug dan kategori
        $product = Product::where('slug', $productSlug)
            ->whereHas('detailCategory.category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            })
            ->with(['detailCategory.category'])
            ->firstOrFail();

        // Gunakan view sesuai nama file kamu: detailproduk.blade.php
        return view('detailproduk', compact('category', 'product'));
    }
}
