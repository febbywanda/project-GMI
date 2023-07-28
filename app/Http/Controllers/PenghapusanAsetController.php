<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenghapusanAset;
use App\Models\PemeliharaanAset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PenghapusanAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penghapusanaset = PenghapusanAset::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.penghapusanaset.index', [
            'penghapusanaset' => $penghapusanaset
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemeliharaanaset = PemeliharaanAset::all();
        return view('admin.penghapusanaset.create', [
            'pemeliharaanaset' => $pemeliharaanaset
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
            'tgl_usulan' => 'required',
            'ket_penghapusan' => 'required',
            'hasil_approval' => 'required',
            'tgl_pemeliharaan' => 'required',
            'tgl_approval' => 'required',
            'status_usulan' => 'required',
            'slug' => 'nullable',
        ]);

        $penghapusanaset = new PenghapusanAset;
        $penghapusanaset->tgl_usulan = $request->tgl_usulan;
        $penghapusanaset->ket_penghapusan = $request->ket_penghapusan;
        $penghapusanaset->hasil_approval = $request->hasil_approval;
        $penghapusanaset->tgl_pemeliharaan = $request->tgl_pemeliharaan;
        $penghapusanaset->tgl_approval = $request->tgl_approval;
        $penghapusanaset->status_usulan = $request->status_usulan;
        $penghapusanaset->slug = Str::slug($request->name, '-');
        $penghapusanaset->save();

        return redirect()->route('penghapusanaset.index')->with('success', 'Penghapusan Aset berhasil ditambahkan');
   
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
