<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = Merk::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.merk.index', compact('merk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.merk.create');
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
            'nama_merk' => 'required',
            'status_merk' => 'required',
        ]);

        $merk = new Merk;
        $merk->nama_merk = $request->nama_merk;
        $merk->status_merk = $request->status_merk;
        $merk->slug = Str::slug($request->name);
        $merk->save();

        return redirect()->route('merk.index')->with('success', 'Merk berhasil ditambahkan');
   
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
        $merk = Merk::find($id);

        return view('admin.merk.edit', compact('merk'));
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
        $merk = Merk::find($id);

        $merk->update([
            'nama_merk' => $request->nama_merk,
            'status_merk' => $request->status_merk,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('merk.index')->with('success', 'Merk berhasil diubah');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merk $merk)
    {
        $merk->delete();
        return redirect()->route('merk.index')->with('success', 'Merk berhasil dihapus');
   
    }
}
