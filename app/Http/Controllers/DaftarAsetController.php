<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Merk;
use App\Models\Ruangan;
use App\Models\Golongan;
use App\Models\Status;
use App\Models\DaftarAset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DaftarAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftaraset = DaftarAset::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.daftaraset.index', [
            'daftaraset' => $daftaraset
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
        $ruangan = Ruangan::all();
        $barang = Barang::all();
        $golongan = Golongan::all();
        $status = Status::all();
        return view('admin.daftaraset.create', [
            'merk' => $merk,
            'ruangan' => $ruangan,
            'barang' => $barang,
            'golongan' => $golongan,
            'status' => $status,
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
            'id_ruangan' => 'required',
            'id_barang' => 'required',
            'id_golongan' => 'required',
            'id_status' => 'required',
            'nama_aset' => 'required',
            'kode_aset' => 'required',
            'harga_pembelian' => 'required',
            'tgl_pembelian' => 'required',
            'masa_manfaat' => 'required',
            'nilai_redusi' => 'required',
            'status_aset' => 'required',
            'slug' => 'nullable',
        ]);

        $daftaraset = new DaftarAset;
        $daftaraset->id_merk = $request->id_merk;
        $daftaraset->id_ruangan = $request->id_ruangan;
        $daftaraset->id_barang = $request->id_barang;
        $daftaraset->id_golongan = $request->id_golongan;
        $daftaraset->id_status = $request->id_status;
        $daftaraset->nama_aset = $request->nama_aset;
        $daftaraset->kode_aset = $request->kode_aset;
        $daftaraset->harga_pembelian = $request->harga_pembelian;
        $daftaraset->tgl_pembelian = $request->tgl_pembelian;
        $daftaraset->masa_manfaat = $request->masa_manfaat;
        $daftaraset->nilai_redusi = $request->nilai_redusi;
        $daftaraset->status_aset = $request->status_aset;
        $daftaraset->slug = Str::slug($request->name, '-');
        $daftaraset->save();

        return redirect()->route('daftaraset.index')->with('success', 'Daftar Aset berhasil ditambahkan');
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
