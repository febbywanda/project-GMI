<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.ruangan.index', compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ruangan.create');
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
            'nama_ruangan' => 'required',
            'kode_ruangan' => 'required',
        ]);

        $ruangan = new Ruangan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->kode_ruangan = $request->kode_ruangan;
        $ruangan->status_ruangan = $request->status_ruangan;
        $ruangan->slug = Str::slug($request->name);
        $ruangan->save();

        return redirect()->route('ruangan.index')->with('success', 'ruangan berhasil ditambahkan');
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
        $ruangan = Ruangan::find($id);

        return view('admin.ruangan.edit', compact('ruangan'));
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
        $ruangan = Ruangan::find($id);

        $ruangan->update([
            'nama_ruangan' => $request->nama_ruangan,
            'kode_ruangan' => $request->kode_ruangan,
            'status_ruangan' => $request->status_ruangan,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus');
    }
}
