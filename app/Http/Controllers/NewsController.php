<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.news.index', [
            'news' => $news
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.news.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'gambar_news' => 'required',
        ],
        [
            'title.required' => 'Judul tidak boleh kosong',
            'gambar_news.required' => 'Gambar tidak boleh kosong',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = auth()->user()->id;
        $data['views'] = 0;
        $data['gambar_news'] = $request->file('gambar_news')->store('images/news');

        News::create($data);

        return redirect()->route('news.index')->with('success', 'Berita Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $kategori = Kategori::all();



        return view('admin.news.edit', [
            'news' => $news,
            'kategori' => $kategori
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('gambar_news'))) {
            $news = News::find($id);
            $news->update([
                'title' => $request->title,
                'author' => $request->author,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'user_id' => auth()->user()->id,
            ]);

            return redirect()->route('news.index')->with('success', 'Berita Berhasil Diubah');

        } else {
            $news = News::find($id);
            Storage::delete($news->gambar_news);
            $news->update([
                'title' => $request->title,
                'author' => $request->author,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'user_id' => auth()->user()->id,
                'gambar_news' => $request->file('gambar_news')->store('images/news')

            ]);

            return redirect()->route('news.index')->with('success', 'Berita Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        Storage::delete($news->gambar_news);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'Berita Berhasil Dihapus');
    }
}
