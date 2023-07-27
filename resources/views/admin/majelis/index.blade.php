@extends('layouts.admin')
@section('title', 'Majelis')
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
                                    <div class="card-title">Data Majelis Periode </div>
                                    @if (count($periode) == 0)
                                        <a href="{{ route('periode.create') }}" class="btn btn-success btn-sm ml-auto"><i
                                                class="fas fa-plus"></i> &nbsp; Tambah Periode</a>
                                    @else
                                     @foreach ($periode as $row )
                                        <a href="{{ route('periode.edit', $row->id) }}" class="btn btn-success btn-sm ml-auto"><i
                                                class="fas fa-edit"></i> &nbsp; Edit Periode {{ $row->periode }}</a>
                                     @endforeach

                                    @endif

                                    <a href="{{ route('majelis-info.create') }}" class="btn btn-primary btn-sm ml-auto"><i
                                            class="fas fa-plus"></i> &nbsp; Tambah Majelis </a>
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
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        @forelse ($majelis as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('storage/public/majelis/' . $row->foto) }}"
                                                        alt="" width="100px"></td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->jabatan }}</td>
                                                <td>
                                                    <a href="{{ route('majelis-info.edit', $row->id) }}"
                                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('majelis-info.destroy', $row->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm" type="submit"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Data Kosong</td>
                                            </tr>
                                        @endforelse
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
