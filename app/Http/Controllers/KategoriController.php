<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
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
            'nama_kategori' => 'required|min:4' 
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug ($request->nama_kategori)
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $kategori = Kategori::findorfail($id);
        return view('admin.kategori.edit', compact('kategori'));
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
        $this->validate($request, [
            'nama_kategori' => 'required|min:4' 
        ]);

        $kategori_data = [
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug ($request->nama_kategori)
        ];

        Kategori::whereId($id)->update($kategori_data);

        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findorfail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Dihapus');
    }
}
