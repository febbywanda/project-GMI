<?php

namespace App\Http\Controllers;

use App\Models\Beritajemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritajemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritajemaat = Beritajemaat::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.beritajemaat.index', compact('beritajemaat'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.beritajemaat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $beritajemaat = new Beritajemaat;
        $beritajemaat->judul = $request->judul;
        $beritajemaat->author = $request->author;
        $beritajemaat->slug = Str::slug($request->judul);
        $beritajemaat->deskripsi = $request->deskripsi;
        $beritajemaat->save();

        return redirect()->route('beritajemaat.index')->with('success', 'Berita Jemaat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beritajemaat  $beritajemaat
     * @return \Illuminate\Http\Response
     */
    public function show(Beritajemaat $beritajemaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beritajemaat  $beritajemaat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beritajemaat = Beritajemaat::find($id);

        return view('admin.beritajemaat.edit', compact('beritajemaat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beritajemaat  $beritajemaat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $beritajemaat = Beritajemaat::find($id);

        $beritajemaat->update([
            'judul' => $request->judul,
            'author' => $request->author,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('beritajemaat.index')->with('success', 'Berita Jemaat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beritajemaat  $beritajemaat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beritajemaat $beritajemaat)
    {

        $beritajemaat->delete();
        return redirect()->route('beritajemaat.index')->with('success', 'Berita Jemaat berhasil dihapus');
    }
}
