@extends('layouts.admin')
@section('title', 'Tambah Buletin')
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
                                <div class="card-title">Form Data Buletin</div>
                                <a href="{{ route('buletin-info.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('buletin-info.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal"
                                        >
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="LongText" name="keterangan" class="form-control" id="keterangan"
                                        placeholder="Cth: Bahasa Indonesia">
                                <div class="form-group">
                                    <label for="foto">Dokumen</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                                @error('foto')
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