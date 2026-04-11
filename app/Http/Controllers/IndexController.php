<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct; // Pastikan model ini ada
use Illuminate\Http\Request;
use App\Models\Article;


class IndexController extends Controller
{
    public function index()
{
    $categories = CategoryProduct::all();

    // Ambil masing-masing 3 artikel terbaru
    $news = Article::where('category', 'news')->latest('tanggal_publikasi')->take(3)->get();
    $tips = Article::where('category', 'tips')->latest('tanggal_publikasi')->take(3)->get();

    // Gabungkan dan urutkan ulang semua artikel berdasarkan tanggal terbaru
    $articles = $news->merge($tips)->sortByDesc('tanggal_publikasi')->values();

    return view('index', compact('categories', 'articles'));
}

}