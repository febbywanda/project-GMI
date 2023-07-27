<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status.create');
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
            'nama_status' => 'required',
        ]);

        $status = new Status;
        $status->nama_status = $request->nama_status;
        $status->slug = Str::slug($request->name);
        $status->save();

        return redirect()->route('status.index')->with('success', 'status berhasil ditambahkan');
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
        $status = Status::find($id);

        return view('admin.status.edit', compact('status'));
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
        $status = Status::find($id);

        $status->update([
            'nama_status' => $request->nama_status,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('status.index')->with('success', 'Status berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('status.index')->with('success', 'Status berhasil dihapus');
    }
}
