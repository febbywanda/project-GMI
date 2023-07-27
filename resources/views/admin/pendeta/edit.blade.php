@extends('layouts.admin')
@section('title', 'Edit Berita')
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
                            <div class="card-title">Edit Data <b>{{ $pendeta->nama }}</b></div>
								<a href="{{ route('pendeta.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
							</div>
						</div>
						<div class="card-body">
                        <form action="{{ route('pendeta.update', $pendeta->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        value="{{$pendeta->nama}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Masa Jabatan</label>
                                    <input type="text" name="masa_jabatan" class="form-control" id="masa_jabatan"
                                        value="{{$pendeta->masa_jabatan}}">
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" name="gambar" class="form-control" >
                                    <small id="newsHelp" class="form-text text-muted">*Gambar wajib di unggah</small>
                                    <br>
                                    <label for="gambar">Gambar Sebelumnya</label>
                                    <br>
                                    <img src="{{ asset('storage/public/pendeta/' . $pendeta->gambar) }}" alt="" width="100px">
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
