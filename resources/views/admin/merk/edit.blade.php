@extends('layouts.admin')
@section('title', 'Merk')
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
                            <div class="card-title">Edit Merk<b>{{ $merk->nama_merk}}</b></div>
								<a href="{{ route('merk.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
							</div>
						</div>
						<div class="card-body">
                        <form action="{{ route('merk.update', $merk->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="judul">Nama Merk</label>
                                    <input type="text" name="nama_merk" class="form-control" id="title" value="{{ $merk->nama_merk}}">
                                </div>
                                <div class="form-group">
                                    <label for="judul">Status Merk</label>
                                    <input type="text" name="status_merk" class="form-control" id="title" value="{{ $merk->status_merk}}">
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