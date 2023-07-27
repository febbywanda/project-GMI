@extends('layouts.admin')
@section('title', 'Tambah Periode')
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
                            <div class="card-title">Form Periode</div>
								<a href="{{ route('majelis-info.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
							</div>
						</div>
						<div class="card-body">
                            <form action="{{ route('periode.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="kategori">Periode</label>
                                    <input type="text" name="periode" class="form-control" id="text" placeholder="Cth: 2019 - 2020">
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