<?php

namespace App\Http\Controllers;

use App\Models\ArtikelNews;
use App\Models\Author;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();

        $artikel_news = ArtikelNews::with(['kategori'])
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(3)
            ->get();

            $authors = Author::all();

        return view('front.index', compact('kategoris', 'artikel_news', 'authors'));
    }
}
