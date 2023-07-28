@extends('layouts.admin')
@section('title', 'Pemeliharaan Aset')
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
								<div class="card-title">Data Pemeliharaan Aset Barang</div>
								<a href="{{ route('pemeliharaanaset.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> &nbsp; Tambah Pemeliharaan Aset</a>
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
										<th>Id Aset</th>
                                        <th>Hasil Pemeliharaan</th>
                                        <th>Biaya Pemeliharaan</th>
                                        <th>Tanggal Penjadwalan</th>
                                        <th>Tanggal Pemeliharaan</th>
										<th>Aksi</th>
									</tr>
								</thead>

								<tbody>
									@forelse ($pemeliharaanaset as $index => $row )
									<tr>
										<td>{{$index + $pemeliharaanaset->firstItem()}}</td>
                                        <td>{{$row->daftaraset->id}}</td>
										<td>{{$row->hasil_pemeliharaan}}</td>
                                        <td>{{$row->biaya_pemeliharaan}}</td>
                                        <td>{{$row->tgl_penjadwalan}}</td>
                                        <td>{{$row->tgl_pemeliharaan}}</td>
                                        <td>

											<a href="{{ route('pemeliharaanaset.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
											<form action="{{ route('pemeliharaanaset.destroy', $row->id)}}" method="POST" class="d-inline">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
											</form>
										</td>
									</tr>
									@empty
									<tr>
										<td colspan="7" class="text-center">Belum Ada Pemeliharaan Aset</td>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
						{{ $pemeliharaanaset->links('vendor.pagination.bootstrap-4') }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
