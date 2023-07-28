@extends('layouts.admin')
@section('title', 'Penghapusan Aset')
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
								<div class="card-title">Data Penghapusan Aset Barang</div>
								<a href="{{ route('penghapusanaset.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> &nbsp; Tambah Penghapusan Aset</a>
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
										<th>Tanggal Usulan</th>
                                        <th>Keterangan Penghapusan</th>
                                        <th>Hasil Approval</th>
                                        <th>Tanggal Pemeliharaan</th>
                                        <th>Tanggal Approval</th>
                                        <th>Status Usulan</th>
										<th>Aksi</th>
									</tr>
								</thead>

								<tbody>
									@forelse ($penghapusanaset as $index => $row )
									<tr>
										<td>{{$index + $penghapusanaset->firstItem()}}</td>
										<td>{{$row->tgl_usulan}}</td>
                                        <td>{{$row->ket_penghapusan}}</td>
                                        <td>{{$row->hasil_approval}}</td>
                                        <td>{{$row->pemeliharaanaset->tgl_pemeliharaan}}</td>
                                        <td>{{$row->tgl_approval}}</td>
                                        <td>{!!$row->status_usulan!!}</td>
                                        <td>

											<a href="{{ route('penghapusanaset.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
											<form action="{{ route('penghapusanaset.destroy', $row->id)}}" method="POST" class="d-inline">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
											</form>
										</td>
									</tr>
									@empty
									<tr>
										<td colspan="8" class="text-center">Belum Ada Penghapusan Aset</td>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
						{{ $penghapusanaset->links('vendor.pagination.bootstrap-4') }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
