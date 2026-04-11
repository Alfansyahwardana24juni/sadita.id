<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use Illuminate\Support\Str; // Tambahan Untuk Artikel Terkait

class ArtikelController extends Controller
{
    
    
 

    public function tampilartikel()
    {
        $news = Article::where('category', 'news')->latest('tanggal_publikasi')->get();
        $tips = Article::where('category', 'tips')->latest('tanggal_publikasi')->get();
        
        return view('artikel', compact('news', 'tips'));
    }

    // Gunakan slug dan pastikan artikel termasuk kategori 'news'
  public function showNews($slug)
{
    $article = Article::where('slug', $slug)
                      ->where('category', 'news')
                      ->firstOrFail();

   // --- TAMBAHAN untuk konten Artikel Terkait---
        // Ambil 3 artikel terkait lain dari kategori 'news'
        $relatedArticles = Article::where('category', 'news')
                                  ->where('id', '!=', $article->id) // Kecualikan artikel saat ini
                                  ->inRandomOrder() // Ambil secara acak
                                  ->limit(3)
                                  ->get();

        // Kirim data ke view 'new' beserta artikel terkait
        // Menambahkan relatedArticles untuk konten Artikel Terkait
        return view('new', compact('article', 'relatedArticles'));
    }


    // Gunakan slug dan pastikan artikel termasuk kategori 'tips'
    public function showTips($slug)
    {
        $article = Article::where('slug', $slug)
                          ->where('category', 'tips')
                          ->firstOrFail();

       // --- TAMBAHAN untuk konten Artikel Lainnya---
        // Ambil 3 artikel terkait lain dari kategori 'tips'
        $relatedArticles = Article::where('category', 'tips')
                                  ->where('id', '!=', $article->id) // Kecualikan artikel saat ini
                                  ->inRandomOrder() // Ambil secara acak
                                  ->limit(3)
                                  ->get();

        // Kirim data ke view 'tips-detail' beserta artikel terkait
        // Menambahkan relatedArticles untuk konten Artikel Terkait
        return view('tips-detail', compact('article', 'relatedArticles'));
    }
    


    public function cari(Request $request)
    {
        $cari = $request->cari;

        $pegawai = DB::table('articles')
                    ->where('judul', 'like', "%" . $cari . "%")
                    ->paginate();

        return view('artikel', ['articles' => $pegawai]);
    }
}


