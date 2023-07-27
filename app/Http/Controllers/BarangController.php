<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Merk;
use App\Models\Golongan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.barang.index', [
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merk = Merk::all();
        $golongan = Golongan::all();
        return view('admin.barang.create' , [
            'merk' => $merk,
            'golongan' => $golongan
        ]);
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
            'id_merk' => 'required',
            'id_golongan' => 'required',
            'nama_barang' => 'required',
            'status_barang' => 'required',
            'slug' => 'nullable',
        ]);

        $barang = new Barang;
        $barang->id_merk = $request->id_merk;
        $barang->id_golongan = $request->id_golongan;
        $barang->nama_barang = $request->nama_barang;
        $barang->status_barang = $request->status_barang;
        $barang->slug = Str::slug($request->nama_barang, '-');
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
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
        //
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
        //
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
