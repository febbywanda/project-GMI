<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use Illuminate\Support\Facades\Storage;


class FotoController extends Controller
{
    public function index()
    {
        $foto = Foto::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.foto.index',compact('foto'));
    }

    public function create()
    {
        return view('admin.foto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $gambar = $request->file('gambar');
        $originalName = $gambar->getClientOriginalName();

        $foto = new Foto;
        $foto->deskripsi = $request->deskripsi;
        $foto->gambar = $originalName;

        if ($request->hasFile('gambar')) {
            $gambar->storeAs('public/foto/', $originalName);
        } else {
            return $request;
            $foto->gambar = '';
        }

        $foto->save();

        return redirect()->route('foto.index')->with('success', 'Foto Berhasil Ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $foto = Foto::find($id);
        return view('admin.foto.edit', compact('foto'));
    }

    public function update(Request $request, $id)
    {
        $gambar = $request->file('gambar');

        if (is_null($gambar)) {
            $foto = Foto::find($id);
            $foto->update([
                'deskripsi' => $request->deskripsi,
            ]);
            return redirect()->route('foto.index')->with('success', 'Foto Berhasil Diubah');
        }

        $foto = Foto::find($id);
        Storage::delete('public/foto/' .$foto->gambar);

        $originalName = $gambar->getClientOriginalName();
        $gambar->storeAs('public/foto/', $originalName);
        $foto->update([
            'deskripsi' => $request->deskripsi,
            'gambar' => $originalName,
        ]);
        return redirect()->route('foto.index')->with('success', 'Foto Berhasil Diubah');
    }

    public function destroy($id)
    {
        $foto = Foto::find($id);
        Storage::delete('public/foto/' .$foto->gambar);
        $foto->delete();
        return redirect()->route('foto.index')->with('success', 'Foto Berhasil Dihapus');
    }
}
