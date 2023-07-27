@extends('layouts.admin')
@section('title', 'Tambah Vidio')
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
                                <div class="card-title">Form Vidio</div>
                                <a href="{{ route('vidio.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('vidio.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="judul"
                                        placeholder="Enter Judul">
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" name="link" class="form-control" id="link"
                                        placeholder="link">
                                <div class="form-group">
                                    <label for="gambar">Banner</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                                @error('gambar')
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