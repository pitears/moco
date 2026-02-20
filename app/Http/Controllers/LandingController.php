<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\News;
use App\Models\Author;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $banners = Banner::all(); //Ambil semua data banner dari database
        $featuredNews = News::where('is_featured', true)->get(); //Ambil data berita yang is featured = true
        $news = News::orderBy('created_at', 'desc')->get()->take(4); //Ambil semua data berita terbaru
        $authors = Author::orderBy('created_at', 'desc')->get()->take(5); //Ambil semua data penulis dari database
        return view('pages.landing', compact('banners', 'featuredNews', 'news', 'authors')); //Kirim data banner, featured news, semua berita, dan penulis ke view   
    }
}

