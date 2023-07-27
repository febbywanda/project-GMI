<?php

namespace App\Http\Controllers;

use App\Models\Buletin;
use Illuminate\Http\Request;

class BuletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buletin = Buletin::latest()->paginate(5);
        return view('admin.buletin.index', compact('buletin'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buletin.create');
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
            'tanggal' => 'required',
            'keterangan' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();

        $buletin =  $request->all();

        if ($request->hasFile('file')) {
            $buletin['file'] = $file->store('buletin');
        } else {
            $buletin['file'] = '';
        }

        Buletin::create($buletin);

        return redirect()->route('buletin-info.index')
            ->with('success', 'Buletin berhasil ditambahkan.');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buletin  $buletin
     * @return \Illuminate\Http\Response
     */
    public function show(Buletin $buletin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buletin  $buletin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buletin = Buletin::findOrFail($id);
        return view('admin.buletin.edit', compact('buletin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buletin  $buletin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
                'tanggal' => 'required',
                'keterangan' => 'required',
                'file' => 'required|mimes:pdf|max:2048',
            ]);

        $buletin = $request->all();
        $file = $request->file('file');

        if ($request->hasFile('file')) {
            $buletin['file'] = $file->store('buletin');
        } else {
            $buletin['file'] = '';
        }

       Buletin::findOrFail($id)->update($buletin);

        return redirect()->route('buletin-info.index')
            ->with('success', 'Buletin berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buletin  $buletin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buletin::findOrFail($id)->delete();

        return redirect()->route('buletin-info.index')
            ->with('success', 'Buletin berhasil dihapus.');
    }
}
