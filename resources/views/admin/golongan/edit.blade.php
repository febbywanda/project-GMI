@extends('layouts.admin')
@section('title', 'Golongan')
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
                            <div class="card-title">Edit Golongan <b>{{ $golongan->nama_golongan }}</b></div>
								<a href="{{ route('golongan.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
							</div>
						</div>
						<div class="card-body">
                        <form action="{{ route('golongan.update', $golongan->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="judul">Nama Golongan</label>
                                    <input type="text" name="nama_golongan" class="form-control" id="title" value="{{ $golongan->nama_golongan}}">
                                </div>
                                <div class="form-group">
                                    <label for="author">Kode Golongan</label>
                                    <input type="text" name="kode_golongan" class="form-control" id="title" value="{{ $golongan->kode_golongan}}">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Status Golongan</label>
                                    <textarea name="status_golongan" id="editor">{{ $golongan->status_golongan}}
                                    </textarea>
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