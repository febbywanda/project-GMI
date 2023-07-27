<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golongan = Golongan::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.golongan.index', compact('golongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.golongan.create');
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
            'nama_golongan' => 'required',
            'kode_golongan' => 'required'
        ]);

        $golongan = new Golongan;
        $golongan->nama_golongan = $request->nama_golongan;
        $golongan->kode_golongan = $request->kode_golongan;
        $golongan->status_golongan = $request->status_golongan;
        $golongan->slug = Str::slug($request->name);
        $golongan->save();

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil ditambahkan');
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
        $golongan = Golongan::find($id);

        return view('admin.golongan.edit', compact('golongan'));
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
        $golongan = Golongan::find($id);

        $golongan->update([
            'nama_golongan' => $request->nama_golongan,
            'kode_golongan' => $request->kode_golongan,
            'status_golongan' => $request->status_golongan,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil diubah');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Golongan $golongan)
    {
        $golongan->delete();
        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil dihapus');
 
    }
}
