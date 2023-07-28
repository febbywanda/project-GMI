@extends('layouts.admin')
@section('title', 'Tambah Daftar Aset')
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
                                <div class="card-title">Form Daftar Aset</div>
                                <a href="{{ route('daftaraset.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('daftaraset.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="id_ruangan">Id Ruangan</label>
                                    <select type="text" name="id_ruangan" class="form-control">
                                        @foreach ($ruangan as $item)
                                        <option value="{{ $item->id }}">{{ $item->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="id_barang">Id Barang</label>
                                    <select type="text" name="id_barang" class="form-control">
                                        @foreach ($barang as $item)
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
                                    <label for="id_status">Id Status</label>
                                    <select type="text" name="id_status" class="form-control">
                                        @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Aset</label>
                                <input type="text" name="nama_aset" class="form-control" id="name"
                                        placeholder="Enter Nama Aset">
                                </div>
                                <div class="form-group">
                                    <label for="kode_aset">Kode Aset</label>
                                <input type="text" name="kode_aset" class="form-control" id="name"
                                        placeholder="Enter Kode Aset">
                                </div>
                                <div class="form-group">
                                    <label for="harga_pembelian">Harga Pembelian</label>
                                <input type="text" name="harga_pembelian" class="form-control" id="name"
                                        placeholder="Enter Harga Pembelian">
                                </div>
                                 <div class="form-group">
                                    <label for="tgl_pembelian">Tanggal Pembelian</label>
                                <input type="date" name="tgl_pembelian" class="form-control" id="name"
                                        placeholder="Enter Tanggal Pembelian">
                                </div>
                                <div class="form-group">
                                    <label for="masa_manfaat">Masa Manfaat</label>
                                <input type="text" name="masa_manfaat" class="form-control" id="name"
                                        placeholder="Enter Masa Manfaat">
                                </div>
                                <div class="form-group">
                                    <label for="nilai_redusi">Nilai Redusi</label>
                                <input type="text" name="nilai_redusi" class="form-control" id="name"
                                        placeholder="Enter Nilai Redusi">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status Aset</label>
                                    <textarea name="status_aset" id="editor">
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
