@extends('layouts.admin')
@section('title', 'Tambah Pemeliharaan Aset')
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
                                <div class="card-title">Form Pemeliharaan Aset</div>
                                <a href="{{ route('pemeliharaanaset.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pemeliharaanaset.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="id_daftaraset">Id Aset</label>
                                    <select type="text" name="id_daftaraset" class="form-control">
                                        @foreach ($daftaraset as $item)
                                        <option value="{{ $item->id }}">{{ $item->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="hasil_pemeliharaan">Hasil Pemeliharaan</label>
                                <input type="text" name="hasil_pemeliharaan" class="form-control" id="name"
                                        placeholder="Enter Hasil Pemeliharaan">
                                </div>
                                <div class="form-group">
                                    <label for="biaya_pemeliharaan">Biaya Pemeliharaan</label>
                                <input type="text" name="biaya_pemeliharaan" class="form-control" id="name"
                                        placeholder="Enter Biaya Pemeliharaan">
                                </div>
                                 <div class="form-group">
                                    <label for="tgl_penjadwalan">Tanggal Penjadwalan</label>
                                <input type="date" name="tgl_penjadwalan" class="form-control" id="name"
                                        placeholder="Enter Tanggal Penjadwalan">
                                </div>
                                  <div class="form-group">
                                    <label for="tgl_pemeliharaan">Tanggal Pemeliharaan</label>
                                <input type="date" name="tgl_pemeliharaan" class="form-control" id="name"
                                        placeholder="Enter Tanggal Pemeliharaan">
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
