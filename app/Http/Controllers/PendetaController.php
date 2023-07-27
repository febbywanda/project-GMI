<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendeta;
use Illuminate\Support\Facades\Storage;

class PendetaController extends Controller
{
    public function index()
    {
        $pendeta = Pendeta::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.pendeta.index', [
            'pendeta' => $pendeta
        ]);
    }

    public function create()
    {
        return view('admin.pendeta.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required',
            'masa_jabatan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $gambar = $request->file('gambar');
        $originalName = $gambar->getClientOriginalName();

        $pendeta = new Pendeta;
        $pendeta->nama = $request->nama;
        $pendeta->masa_jabatan = $request->masa_jabatan;
        $pendeta->gambar = $originalName;

        if ($request->hasFile('gambar')) {
            $gambar->storeAs('public/pendeta/', $originalName);
        } else {
            return $request;
            $pendeta->gambar = '';
        }

        $pendeta->save();

        return redirect()->route('pendeta.index')
            ->with('success', 'Pendeta berhasil ditambahkan');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pendeta = Pendeta::find($id);
        return view('admin.pendeta.edit', compact('pendeta'));
    }


    public function update(Request $request, $id)
    {
        $gambar = $request->file('gambar');

        if (is_null($gambar)) {
            $pendeta = Pendeta::find($id);
            $pendeta->update([
                'nama' => $request->nama,
                'masa_jabatan' => $request->masa_jabatan,
            ]);
            return redirect()->route('pendeta.index')->with('success', 'Pendeta Berhasil Diubah');
        }

        $pendeta = Pendeta::find($id);
        Storage::delete('public/pendeta/' .$pendeta->gambar);

        $originalName = $gambar->getClientOriginalName();
        $gambar->storeAs('public/pendeta/', $originalName);
        $pendeta->update([
            'nama' => $request->nama,
            'masa_jabatan' => $request->masa_jabatan,
            'gambar' => $originalName,
        ]);

        return redirect()->route('pendeta.index')->with('success', 'Pendeta Berhasil Diubah');
    }


    public function destroy($id)
    {
        $pendeta = Pendeta::find($id);
        Storage::delete('public/pendeta/' .$pendeta->gambar);
        $pendeta->delete();

        return redirect()->route('pendeta.index')
            ->with('success', 'Pendeta berhasil dihapus');
    }

    
}
