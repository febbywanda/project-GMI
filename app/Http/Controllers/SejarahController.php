<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class SejarahController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::all();
        return view('admin.sejarah.index', compact('sejarah'));
    }

    public function create()
    {
        return view('admin.sejarah.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
            'gambar' => 'required',
        ],
        [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'gambar.required' => 'Gambar tidak boleh kosong',
        ]);

        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->store('images/sejarah');
        Sejarah::create($data);

        return redirect()->route('sejarah.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $sejarah = Sejarah::find($id);
        return view('admin.sejarah.edit', compact('sejarah'));
    }

    public function update(Request $request, $id)
    {
        if (empty($request->file('gambar'))) {
            $data = $request->all();
            $sejarah = Sejarah::find($id);
            $sejarah->update($data);
        } else {
            $data = $request->all();
            $data['gambar'] = $request->file('gambar')->store('news');
            $sejarah = Sejarah::find($id);
            Storage::delete($sejarah->gambar);
            $sejarah->update($data);
        }

        return redirect()->route('sejarah.index')->with('success', 'Data Berhasil Diubah');
    }

}
