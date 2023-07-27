@extends('layouts.admin')
@section('title', 'Tambah Berita Jemaat')
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
                                <div class="card-title">Form Berita Jemaat</div>
                                <a href="{{ route('beritajemaat.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('beritajemaat.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="judul">Hari/Tanggal</label>
                                    <input type="text" name="judul" class="form-control" id="date"
                                        placeholder="Minggu, 12 November 2022">
                                </div>
                                <div class="form-group">
                                    <label for="author">Penulis</label>
                                    <input type="text" name="author" class="form-control" id="title"
                                        placeholder="Enter Nama Penulis">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="editor">
                                    </textarea>
                                    <small id="newsHelp" class="form-text text-muted">Make sense.</small>
                                </div>
                                @error('deskripsi')
                                <small class="alert alert-danger">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                                    <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection