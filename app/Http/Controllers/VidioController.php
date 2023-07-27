<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vidio;
use Illuminate\Support\Facades\Storage;


class VidioController extends Controller
{
    public function index()
    {
        $vidio = Vidio::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.vidio.index',[
            'vidio' => $vidio
        ]);
    }

    public function create()
    {
        return view('admin.vidio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'link' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $originalName = $gambar->getClientOriginalName();

        $vidio = new Vidio;
        $vidio->judul = $request->judul;
        $vidio->link = $request->link;
        $vidio->gambar = $originalName;

        if ($request->hasFile('gambar')) {
            $gambar->storeAs('public/vidio/', $originalName);
        } else {
            return $request;
            $vidio->gambar = '';
        }

        $vidio->save();

        return redirect()->route('vidio.index')->with('success', 'vidio Berhasil Ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $vidio = Vidio::find($id);
        return view('admin.vidio.edit',[
            'vidio' => $vidio
        ]);
    }

    public function update(Request $request, $id)
    {
        $gambar = $request->file('gambar');

        if (is_null($gambar)) {
            $vidio = Vidio::find($id);
            $vidio->update([
                'judul' => $request->judul,
                'link' => $request->link,
            ]);
            return redirect()->route('vidio.index')->with('success', 'Foto Berhasil Diubah');
        }

        $vidio = Vidio::find($id);
        Storage::delete('public/vidio/' .$vidio->gambar);

        $originalName = $gambar->getClientOriginalName();
        $gambar->storeAs('public/vidio/', $originalName);
        $vidio->update([
            'judul' => $request->judul,
            'link' => $request->link,
            'gambar' => $originalName,
        ]);
        return redirect()->route('vidio.index')->with('success', 'Foto Berhasil Diubah');        
    }

    public function destroy($id)
    {
        $vidio = Vidio::find($id);
        Storage::delete('public/vidio/' .$vidio->gambar);
        $vidio->delete();
        return redirect()->route('vidio.index')->with('success', 'Vidio Berhasil Dihapus');
    }


}
