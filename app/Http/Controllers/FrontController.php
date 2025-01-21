<?php

namespace App\Http\Controllers;

use App\Models\ArtikelNews;
use App\Models\Author;
use App\Models\BannerIklan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();

        $artikels = ArtikelNews::with(['kategori'])
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(3)
            ->get();

        $featured_artikels = ArtikelNews::with(['kategori'])
            ->where('is_featured', 'featured')
            ->inRandomOrder()
            ->take(3)
            ->get();

        $authors = Author::all();

        $banner_iklans = BannerIklan::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            //->take(1)
            //->get();
            ->first();

        $wisata_artikels = ArtikelNews::whereHas('kategori', function ($query) {
                $query->where('nama', 'wisata');
            })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        $wisata_featured_artikels = ArtikelNews::whereHas('kategori', function ($query) {
                $query->where('nama', 'wisata');
            })
            ->where('is_featured', 'featured')
            ->inRandomOrder()
            ->first();

        $kuliner_artikels = ArtikelNews::whereHas('kategori', function ($query) {
                $query->where('nama', 'kuliner');
            })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        $kuliner_featured_artikels = ArtikelNews::whereHas('kategori', function ($query) {
                $query->where('nama', 'kuliner');
            })
            ->where('is_featured', 'featured')
            ->inRandomOrder()
            ->first();

        $religi_featured_artikels = ArtikelNews::whereHas('kategori', function ($query) {
                $query->where('nama', 'religi');
            })
            ->where('is_featured', 'featured')
            ->inRandomOrder()
            ->first();

        $religi_artikels = ArtikelNews::whereHas('kategori', function ($query) {
                $query->where('nama', 'religi');
            })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        return view('front.index', compact('religi_artikels','religi_featured_artikels','wisata_featured_artikels','wisata_artikels','kuliner_featured_artikels','kuliner_artikels','kategoris', 'artikels', 'authors', 'featured_artikels', 'banner_iklans'));
    }

    public function kategori(Kategori $kategori){
        $kategoris = Kategori::all();

        $banner_iklans = BannerIklan::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            //->take(1)
            //->get();
            ->first();

        return view('front.kategori', compact('kategori', 'kategoris', 'banner_iklans'));
    }
}
