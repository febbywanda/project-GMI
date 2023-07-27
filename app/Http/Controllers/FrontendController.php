<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\News;
use App\Models\Sektor;
use App\Models\Ayatharian;
use App\Models\Beritajemaat;
use App\Models\Sejarah;
use App\Models\Vidio;
use App\Models\Pendeta;
use App\Models\Foto;
use App\Models\Majelis;
use App\Models\Periode;
use App\Models\Buletin;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;



// use Barryvdh\Debugbar\Facades\Debugbar;

class FrontendController extends Controller
{
    public function index()
    {
        $postTerkini = News::orderBy('created_at', 'desc')->take(5)->get();
        $kategori = Kategori::all();
        $ayatharian = Ayatharian::orderBy('created_at', 'desc')->take(7)->get();
        $buletin = Buletin::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.home', [
            'postTerkini' => $postTerkini,
            'kategori' => $kategori,
            'ayatharian' => $ayatharian,
            'buletin' => $buletin
        ]);
    }

    public function news()
    {
        $kategori = Kategori::all();
        $news = News::paginate(3)->fragment('news');
        $beritaTerbaru = News::orderBy('created_at', 'DESC')->limit('1')->get();
        $beritaBykategori = News::with('kategori')->get();
        return view('pages.news', [
            'kategori' => $kategori,
            'news' => $news,
            'beritaTerbaru' => $beritaTerbaru,
            'beritaBykategori' => $beritaBykategori
        ]);
    }

    public function detail($slug)
    {

        $news = News::where('slug', $slug)->first();
        $kategori = Kategori::all();
        $postTerkini = News::orderBy('created_at', 'DESC')->limit('4')->get();
        $beritaLainnya = News::where('id', '!=', $news->id)->limit('3')->get();

        return view('pages.berita.detail-berita', [
            'news' => $news,
            'kategori' => $kategori,
            'postTerkini' => $postTerkini,
            'beritaLainnya' => $beritaLainnya
        ]);
    }

    public function category($categoryName)
    {
        $category = Kategori::where('slug', $categoryName)->first();
        $categories = $kategori = Kategori::all();

        if (!$category) {
            return view('pages.news-by-category', [
                'errorMessage' => 'Kategori ' . $categoryName .  ' tidak ditemukan',
                'categories' => $categories
            ]);
        }

        $newsByCategory = News::where('kategori_id', $category->id)->paginate(6);

        return view('pages.news-by-category', [
            'categoryName' => $category->nama_kategori,
            'newsByCategory' => $newsByCategory,
            'categories' => $categories,
            'errorMessage' => null
        ]);
    }

    public function about()
    {
        $sejarah = Sejarah::all();
        $pendeta = Pendeta::all();
        return view('pages.about', [
            'sejarah' => $sejarah,
            'pendeta' => $pendeta
        ]);
    }

    public function majelis()
    {
        $majelis = Majelis::all();
        $periode = Periode::all();
        return view('pages.majelis', [
            'majelis' => $majelis,
            'periode' => $periode
        ]);
    }

    public function buletin()
    {
        $postTerkini = News::orderBy('created_at', 'desc')->take(5)->get();
        $buletin = Buletin::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.buletin', [
            'postTerkini' => $postTerkini,
            'buletin' => $buletin
        ]);
    }

    public function downloadBuletin($id)
    {
        $buletin = Buletin::find($id);
        $link = $buletin->file;
        return Storage::download($link);
    }

    public function komsel(Request $request)
    {
        $postTerkini = News::orderBy('created_at', 'desc')->take(5)->get();
        $kategori = Kategori::all();
        if ($request->has('search')) {
            $sektor = Sektor::where('tanggal', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $sektor = Sektor::paginate(10);
        }

        return view('pages.komsel', [
            'postTerkini' => $postTerkini,
            'kategori' => $kategori,
            'sektor' => $sektor
        ]);
    }

    public function beritajemaat()
    {
        $postTerkini = News::orderBy('created_at', 'desc')->take(5)->get();
        $kategori = Kategori::all();
        $beritajemaat = Beritajemaat::orderBy('created_at', 'desc')->paginate(5);
        $ayatharian = Ayatharian::orderBy('created_at', 'desc')->take(7)->get();
        return view('pages.beritajemaat', [
            'postTerkini' => $postTerkini,
            'kategori' => $kategori,
            'beritajemaat' => $beritajemaat,
            'ayatharian' => $ayatharian
        ]);
    }

    public function galerifoto()
    {
        $foto = Foto::orderBy('created_at', 'desc')->paginate(15);
        $postTerkini = News::orderBy('created_at', 'desc')->take(5)->get();
        $kategori = Kategori::all();
        return view('pages.galeri-foto', [
            'foto' => $foto,
            'postTerkini' => $postTerkini,
            'kategori' => $kategori
        ]);
    }

    public function galerivideo()
    {
        $vidio = Vidio::orderBy('created_at', 'desc')->paginate(15);
        $postTerkini = News::orderBy('created_at', 'desc')->take(5)->get();
        $kategori = Kategori::all();
        return view('pages.galeri-video', [
            'vidio' => $vidio,
            'postTerkini' => $postTerkini,
            'kategori' => $kategori
        ]);
    }
}
