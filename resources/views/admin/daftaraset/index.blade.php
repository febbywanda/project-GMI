@extends('layouts.admin')
@section('title', 'Daftar Aset')
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
								<div class="card-title">Data Daftar Aset Barang</div>
								<a href="{{ route('daftaraset.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> &nbsp; Tambah Daftar Aset</a>
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
										<th>Id Ruangan</th>
                                        <th>Id Barang</th>
										<th>Id Kategori</th>
                                        <th>Id Status</th>
										<th>Nama Aset</th>
                                        <th>Kode Aset</th>
                                        <th>Harga Pembelian</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Masa Manfaat</th>
                                        <th>Nilai Redusi</th>
										<th>Status Aset</th>
										<th>Aksi</th>
									</tr>
								</thead>

								<tbody>
									@forelse ($daftaraset as $index => $row )
									<tr>
										<td>{{$index + $daftaraset->firstItem()}}</td>
                                        <td>{{$row->merk->id}}</td>
                                        <td>{{$row->ruangan->id}}</td>
                                        <td>{{$row->barang->id}}</td>
										<td>{{$row->golongan->id}}</td>
                                        <td>{{$row->status->id}}</td>
										<td>{{$row->nama_aset}}</td>
                                        <td>{{$row->kode_aset}}</td>
                                        <td>{{$row->harga_pembelian}}</td>
                                        <td>{{$row->tgl_pembelian}}</td>
                                        <td>{{$row->masa_manfaat}}</td>
                                        <td>{{$row->nilai_redusi}}</td>
										<td>{!!$row->status_aset!!}</td>
                                        <td>

											<a href="{{ route('daftaraset.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
											<form action="{{ route('daftaraset.destroy', $row->id)}}" method="POST" class="d-inline">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
											</form>
										</td>
									</tr>
									@empty
									<tr>
										<td colspan="14" class="text-center">Belum Ada Daftar Aset</td>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
						{{ $daftaraset->links('vendor.pagination.bootstrap-4') }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
