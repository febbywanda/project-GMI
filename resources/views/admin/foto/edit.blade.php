@extends('layouts.admin')
@section('title', 'Edit Foto')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                </div>
            </div>
        </div>

        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Edit foto</div>
                                <a href="{{ route('foto.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                                        value="{{ $foto->deskripsi }}">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Foto</label>
                                    <input type="file" name="gambar" class="form-control" id="gambar">
                                    <small id="newsHelp" class="form-text text-muted">*Gambar wajib di unggah</small>
                                    <br>
                                    <label for="gambar">Gambar Sebelumnya</label>
                                    <br>
                                    <img src="{{ asset('storage/public/foto/' . $foto->gambar) }}" alt="" width="100px">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
