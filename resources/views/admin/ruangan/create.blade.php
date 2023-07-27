@extends('layouts.admin')
@section('title', 'Tambah Ruangan')
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
                                <div class="card-title">Form Ruangan</div>
                                <a href="{{ route('ruangan.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('ruangan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                               <div class="form-group">
                                    <label for="name">Nama Ruangan</label>
                                    <input type="text" name="nama_ruangan" class="form-control" id="name"
                                        placeholder="Enter Nama Ruangan">
                                </div>
                                <div class="form-group">
                                    <label for="kode">Kode Ruangan</label>
                                    <input type="text" name="kode_ruangan" class="form-control" id="kode"
                                        placeholder="Enter Kode Ruangan">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status Ruangan</label>
                                    <textarea name="status_ruangan" id="editor">
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