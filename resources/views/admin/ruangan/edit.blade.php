@extends('layouts.admin')
@section('title', 'Ruangan')
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
                            <div class="card-title">Edit Ruangan <b>{{ $ruangan->nama_ruangan }}</b></div>
								<a href="{{ route('ruangan.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
							</div>
						</div>
						<div class="card-body">
                        <form action="{{ route('ruangan.update', $ruangan->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="judul">Nama Ruangan</label>
                                    <input type="text" name="nama_ruangan" class="form-control" id="title" value="{{ $ruangan->nama_ruangan}}">
                                </div>
                                <div class="form-group">
                                    <label for="author">Kode Ruangan</label>
                                    <input type="text" name="kode_ruangan" class="form-control" id="title" value="{{ $ruangan->kode_ruangan}}">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Status Ruangan</label>
                                    <textarea name="status_ruangan" id="editor">{{ $ruangan->status_ruangan}}
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