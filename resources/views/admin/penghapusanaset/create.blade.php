@extends('layouts.admin')
@section('title', 'Tambah Penghapusan Aset')
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
                                <div class="card-title">Form Penghapusan Aset</div>
                                <a href="{{ route('penghapusanaset.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('penghapusanaset.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="tgl_usulan">Tanggal Usulan</label>
                                <input type="date" name="tgl_usulan" class="form-control" id="name"
                                        placeholder="Enter Tanggal Usulan">
                                </div>
                                <div class="form-group">
                                    <label for="ket_penghapusan">Keterangan Penghapusan</label>
                                <input type="text" name="ket_penghapusan" class="form-control" id="name"
                                        placeholder="Enter Keterangan Penghapusan">
                                </div>
                                 <div class="form-group">
                                    <label for="hasil_approval">Hasil Approval</label>
                                <input type="text" name="hasil_approval" class="form-control" id="name"
                                        placeholder="Enter Hasil Approval">
                                </div>
                                  <div class="form-group">
                                    <label for="tgl_pemeliharaan">Tanggal Pemeliharaan</label>
                                    <select type="date" name="tgl_pemeliharaan" class="form-control">
                                        @foreach ($pemeliharaanaset as $item)
                                        <option value="{{ $item->tgl_pemeliharaan }}">{{ $item->tgl_pemeliharaan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="tgl_approval">Tanggal Approval</label>
                                <input type="date" name="tgl_approval" class="form-control" id="name"
                                        placeholder="Enter Tanggal Approval">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status USulan</label>
                                    <textarea name="status_usulan" id="editor">
                                    </textarea>
                                    <small id="newsHelp" class="form-text text-muted">Make sense.</small>
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
