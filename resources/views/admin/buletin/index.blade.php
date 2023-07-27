@extends('layouts.admin')
@section('title', 'Buletin')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    </div>
                </div>
            </div>

            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card full-height">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title">Data Buletin </div>
                                    <a href="{{ route('buletin-info.create') }}" class="btn btn-primary btn-sm ml-auto"><i
                                            class="fas fa-plus"></i> &nbsp; Tambah </a>
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
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($buletin as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->keterangan }}</td>
                                                    <td>
                                                        <a href="{{ route('buletin-info.edit', $item->id) }}"
                                                            class="btn btn-success btn-sm"><i class="fas fa-edit"></i>
                                                            &nbsp; Edit</a>
                                                        <form action="{{ route('buletin-info.destroy', $item->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-trash"></i> &nbsp; Hapus</button>
                                                        </form>
                                                    </td>
                                                @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Data Kosong</td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
