@extends('layouts.admin')
@section('title', 'Edit Vidio')
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
                                <div class="card-title">Edit Vidio</div>
                                <a href="{{ route('vidio.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('vidio.update', $vidio->id) }}" method="POST" >
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="judul"
                                        value="{{ $vidio->judul }}">
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" name="link" class="form-control" id="link"
                                        value="{{ $vidio->link }}">
                                    <small id="kategoriHelp" class="form-text text-muted">Make sense.</small>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Banner</label>
                                    <input type="file" name="gambar" class="form-control" id="gambar">
                                    <small id="newsHelp" class="form-text text-muted">*Gambar wajib di unggah</small>
                                    <br>
                                    <label for="gambar">Gambar Sebelumnya</label>
                                    <br>
                                    <img src="{{ asset('storage/public/vidio/' . $vidio->gambar) }}" alt="" width="100px">
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
