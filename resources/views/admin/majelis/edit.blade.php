@extends('layouts.admin')
@section('title', 'Edit Majelis')
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
                                    <div class="card-title">Edit Data <b>{{ $majelis->nama }}</b></div>
                                    <a href="{{ route('majelis-info.index') }}"
                                        class="btn btn-warning btn-sm ml-auto">Kembali</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('majelis-info.update', $majelis->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            value="{{ $majelis->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control" id="jabatan"
                                            value="{{ $majelis->jabatan }}">
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" name="foto" class="form-control">
                                            <small id="newsHelp" class="form-text text-muted">*foto wajib di unggah</small>
                                            <br>
                                            <label for="foto">Foto Sebelumnya</label>
                                            <br>
                                            <img src="{{ asset('storage/public/majelis/' . $majelis->foto) }}"
                                                alt="" width="100px">
                                        </div>
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
