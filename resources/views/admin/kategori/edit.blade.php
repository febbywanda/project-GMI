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
                            <div class="card-title">Edit Kategori <b>{{ $kategori->nama_kategori }}</b></div>
								<a href="{{ route('kategori.index') }}" class="btn btn-warning btn-sm ml-auto"><i class="fa-solid fa-backward"></i>Kembali</a>
							</div>
						</div>
						<div class="card-body">
                            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="kategori">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control" id="text" placeholder="Enter Kategori">
                                    <small id="kategoriHelp" class="form-text text-muted">Make sense.</small>
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