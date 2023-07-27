@extends('layouts.admin')
@section('title', 'Tambah Ayat Harian')
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
                            <div class="card-title">Form Ayat Harian</div>
								<a href="{{ route('ayatharian.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
							</div>
						</div>
						<div class="card-body">
                            <form action="{{ route('ayatharian.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="hari">Hari</label>
                                    <input type="text" name="hari" class="form-control" id="text" placeholder="Enter Hari">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="date" name="tanggal"/>
                                </div>
                                <div class="form-group">
                                    <label for="ayat">Ayat</label>
                                    <input type="text" name="ayat" class="form-control" id="ayat" placeholder="Enter Ayat">
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