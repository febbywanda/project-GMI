<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarAset;
use App\Models\PemeliharaanAset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PemeliharaanAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemeliharaanaset = PemeliharaanAset::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pemeliharaanaset.index', [
            'pemeliharaanaset' => $pemeliharaanaset
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftaraset = DaftarAset::all();
        return view('admin.pemeliharaanaset.create', [
            'daftaraset' => $daftaraset
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
            'id_daftaraset' => 'required',
            'hasil_pemeliharaan' => 'required',
            'biaya_pemeliharaan' => 'required',
            'tgl_penjadwalan' => 'required',
            'tgl_pemeliharaan' => 'required',
            'slug' => 'nullable',
        ]);

        $pemeliharaanaset = new PemeliharaanAset;
        $pemeliharaanaset->id_daftaraset = $request->id_daftaraset;
        $pemeliharaanaset->hasil_pemeliharaan = $request->hasil_pemeliharaan;
        $pemeliharaanaset->biaya_pemeliharaan = $request->biaya_pemeliharaan;
        $pemeliharaanaset->tgl_penjadwalan = $request->tgl_penjadwalan;
        $pemeliharaanaset->tgl_pemeliharaan = $request->tgl_pemeliharaan;
        $pemeliharaanaset->slug = Str::slug($request->name, '-');
        $pemeliharaanaset->save();

        return redirect()->route('pemeliharaanaset.index')->with('success', 'Pemeliharaan Aset berhasil ditambahkan');
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
