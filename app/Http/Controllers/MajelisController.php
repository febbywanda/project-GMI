<?php

namespace App\Http\Controllers;

use App\Models\Majelis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MajelisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majelis = Majelis::all();
        $periode = DB::table('periodes')->get();
        return view('admin.majelis.index', compact('majelis', 'periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.majelis.create');
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
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $foto = $request->file('foto');
        $originalName = $foto->getClientOriginalName();

        $majelis = new Majelis;
        $majelis->nama = $request->nama;
        $majelis->jabatan = $request->jabatan;
        $majelis->foto = $originalName;

        if ($request->hasFile('foto')) {
            $foto->storeAs('public/majelis/', $originalName);
        } else {
            return $request;
            $majelis->foto = '';
        }

        $majelis->save();

        return redirect()->route('majelis-info.index')
            ->with('success', 'Majelis berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Majelis  $majelis
     * @return \Illuminate\Http\Response
     */
    public function show(Majelis $majelis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Majelis  $majelis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $majelis = Majelis::find($id);
        return view('admin.majelis.edit', compact('majelis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Majelis  $majelis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $foto = $request->file('foto');

        if($foto == '') {
            $majelis = Majelis::find($id);
            $majelis->nama = $request->nama;
            $majelis->jabatan = $request->jabatan;
            $majelis->foto = $request->foto;
            $majelis->save();
        } else {
            $foto = $request->file('foto');
            $originalName = $foto->getClientOriginalName();
            $majelis = Majelis::find($id);
            $majelis->nama = $request->nama;
            $majelis->jabatan = $request->jabatan;
            $majelis->foto = $originalName;
            $foto->storeAs('public/majelis/', $originalName);
            $majelis->save();
        }

        return redirect()->route('majelis-info.index')
            ->with('success', 'Majelis berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Majelis  $majelis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $majelis = Majelis::find($id);
        $majelis->delete();

        return redirect()->route('majelis-info.index')
            ->with('success', 'Majelis berhasil dihapus');

    }
}
