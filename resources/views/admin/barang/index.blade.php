@extends('layouts.admin')
@section('title', 'Barang')
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
								<div class="card-title">Data Barang</div>
								<a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> &nbsp; Tambah Barang</a>
							</div>
						</div>
						@if (Session::has('success'))
							<div class="alert alert-success">
								{{ Session::get('success') }}
							</div>
						@endif
						<div class="card-body">
							<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Id Merk</th>
										<th>Id Kategori</th>
										<th>Nama Barang</th>
										<th>Status Barang</th>
										<th>Aksi</th>
									</tr>
								</thead>

								<tbody>
									@forelse ($barang as $index => $row )
									<tr>
										<td>{{$index + $barang->firstItem()}}</td>
                                        <td>{{$row->merk->id_merk}}</td>
										<td>{{$row->golongan->id_golongan}}</td>
										<td>{{$row->nama_barang}}</td>
										<td>{{$row->status_barang}}</td>
                                        <td>{{ $row->slug }}
											
											<a href="{{ route('barang.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
											<form action="{{ route('barang.destroy', $row->id)}}" method="POST" class="d-inline">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
											</form>
										</td>
									</tr>
									@empty
									<tr>
										<td colspan="6" class="text-center">Belum Ada Barang</td>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
						{{ $barang->links('vendor.pagination.bootstrap-4') }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection