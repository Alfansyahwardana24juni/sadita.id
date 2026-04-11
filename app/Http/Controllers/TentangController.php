<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\VideoProfile;

class TentangController extends Controller
{
    public function tampiltentang()
    {
        $video = VideoProfile::first(); // Ambil video pertama
        $testimonis = Testimoni::all();
        
        return view('tentang', compact('testimonis','video'));
    }
}