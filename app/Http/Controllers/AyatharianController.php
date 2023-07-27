<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ayatharian;


class AyatharianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayatharian = Ayatharian::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.ayat.index', [
            'ayatharian' => $ayatharian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ayat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ayatharian = Ayatharian::create([
            'ayat' => $request->ayat,
            'tanggal' => $request->tanggal,
            'hari' => $request->hari,

        ]);

        return redirect()->route('ayatharian.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $ayatharian = Ayatharian::find($id);
        return view('admin.ayat.edit', [
            'ayatharian' => $ayatharian
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
        $ayatharian = Ayatharian::find($id);
        $ayatharian->update([
            'ayat' => $request->ayat,
            'tanggal' => $request->tanggal,
            'hari' => $request->hari,
        ]);

        return redirect()->route('ayatharian.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ayatharian = Ayatharian::find($id);
        $ayatharian->delete();
        return redirect()->route('ayatharian.index')->with('success', 'Data Berhasil Dihapus');
    }
}
