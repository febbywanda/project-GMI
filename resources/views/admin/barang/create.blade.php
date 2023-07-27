@extends('layouts.admin')
@section('title', 'Tambah Barang')
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
                                <div class="card-title">Form Barang</div>
                                <a href="{{ route('barang.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="id_merk">Id Merk</label>
                                    <select type="text" name="id_merk" class="form-control">
                                        @foreach ($merk as $item)
                                        <option value="{{ $item->id }}">{{ $item->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_golongan">Id Golongan</label>
                                    <select type="text" name="id_golongan" class="form-control">
                                        @foreach ($golongan as $item)
                                        <option value="{{ $item->id }}">{{ $item->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" id="name"
                                        placeholder="Enter Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status Barang</label>
                                    <textarea name="status_barang" id="editor">
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
