<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sektor;
use Illuminate\Support\Str;


class SektorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sektor = Sektor::paginate(10);
        return view('admin.sektor.index', [
            'sektor' => $sektor
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sektor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sektor = Sektor::create([
            'nama_sektor' => $request->nama_sektor,
            'tanggal' => $request->tanggal,
            'keluarga' => $request->keluarga,
            'alamat' => $request->alamat,
            'slug' => Str::slug ($request->nama_sektor)

        ]);

        return redirect()->route('sektor.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $sektor = Sektor::find($id);
        return view('admin.sektor.edit', [
            'sektor' => $sektor
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
        $sektor = Sektor::find($id);
        $sektor->update([
            'nama_sektor' => $request->nama_sektor,
            'tanggal' => $request->tanggal,
            'keluarga' => $request->keluarga,
            'alamat' => $request->alamat,
            'slug' => Str::slug ($request->nama_sektor)
        ]);

        return redirect()->route('sektor.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
