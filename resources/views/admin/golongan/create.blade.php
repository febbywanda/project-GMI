@extends('layouts.admin')
@section('title', 'Tambah Golongan Barang')
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
                                <div class="card-title">Form Golongan Barang</div>
                                <a href="{{ route('golongan.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('golongan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                               <div class="form-group">
                                    <label for="nama">Nama Golongan</label>
                                    <input type="text" name="nama_golongan" class="form-control" id="nama"
                                        placeholder="Enter Nama Golongan">
                                </div>
                                <div class="form-group">
                                    <label for="kode">Kode Golongan</label>
                                    <input type="text" name="kode_golongan" class="form-control" id="kode"
                                        placeholder="Enter Kode Golongan">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status Golongan</label>
                                    <textarea name="status_golongan" id="editor">
                                    </textarea>
                                    <small id="newsHelp" class="form-text text-muted">Make sense.</small>
                                </div>
                                @error('status')
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