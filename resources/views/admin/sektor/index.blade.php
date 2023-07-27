@extends('layouts.admin')
@section('title', 'Kebaktian Sektor')
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
								<div class="card-title">Data Jadwal Kebaktian Sektor</div>
								<a href="{{route('sektor.create')}}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> &nbsp; Tambah Jadwal</a>
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
                                        <th>Sektor</th>
                                        <th>Tanggal</th>
                                        <th>Keluarga</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
									</tr>
								</thead>

								<tbody>
                                @forelse ($sektor as $index => $row )
									<tr>
										<td>{{$index + $sektor->firstItem()}}</td>
										<td>{{$row->nama_sektor}}</td>
										<td>{{ date('d M Y', strtotime($row->tanggal)) }}</td>
										<td>{{$row->keluarga}}</td>
										<td>{{$row->alamat}}</td>
                                        <td><a href="{{ route('sektor.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a></td>
									</tr>

									@empty
									<tr>
										<td colspan="6" class="text-center">Belum Ada Berita</td>
									</tr>
									@endforelse

								</tbody>
							</table>
						</div>
						{{ $sektor->links('vendor.pagination.bootstrap-4') }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection