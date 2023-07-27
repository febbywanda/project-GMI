@extends('layouts.admin')
@section('title', 'Edit Kategori')
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
                                <div class="card-title">Edit Jadwal Kebaktian</div>
                                <a href="{{ route('sektor.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sektor.update', $sektor->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="sektor">Sektor</label>
                                    <input type="text" name="nama_sektor" class="form-control" id="sektor"
                                    value="{{ $sektor->nama_sektor }}" >
                                    <small id="kategoriHelp" class="form-text text-muted">Make sense.</small>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="date" name="tanggal" value="{{ $sektor->tanggal }}" />
                                </div>
                                <div class="form-group">
                                    <label for="keluarga">Keluarga</label>
                                    <input type="text" name="keluarga" class="form-control" id="keluarga"
                                    value="{{ $sektor->keluarga }}" >
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat"
                                    value="{{ $sektor->alamat }}" >
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