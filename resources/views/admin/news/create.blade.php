@extends('layouts.admin')
@section('title', 'Tambah Berita')
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
                                <div class="card-title">Form Berita</div>
                                <a href="{{ route('news.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Enter Judul Berita">
                                </div>
                                <div class="form-group">
                                    <label for="title">Penulis</label>
                                    <input type="text" name="author" class="form-control" id="title"
                                        placeholder="Enter Nama Penulis">
                                </div>
                                <div class="form-group">
                                    <label for="kategori_id">Ketegori</label>
                                    <select type="text" name="kategori_id" class="form-control">
                                        @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="body">Deskripsi</label>
                                    <textarea name="body" id="editor">
                                    </textarea>
                                    <small id="newsHelp" class="form-text text-muted">Make sense.</small>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_news">Gambar</label>
                                    <input type="file" name="gambar_news" class="form-control">
                                </div>
                                @error('gambar_news')
                                <small class="alert alert-danger">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <label for="news">Status</label>
                                    <select name="is_active" class="form-control">
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
                                    </select>
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