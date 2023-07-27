@extends('layouts.admin')
@section('title', 'Vidio')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                </div>
            </div>
        </div>

        <div class="page-inner ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Vidio</div>
                                <a href="{{ route('vidio.create') }}" class="btn btn-primary btn-sm ml-auto"><i
                                        class="fas fa-plus"></i> &nbsp; Tambah Vidio</a>
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
                                            <th>Banner</th>
                                            <th>Judul</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($vidio as $index => $row )
                                        <tr>
                                            <td>{{$index + $vidio->firstItem()}}</td>
                                            <td><a href="{{$row->link}}"><img src="{{ asset('storage/public/vidio/' . $row->gambar) }}" alt=""
                                                    width="100px"></a></td>
                                            <td>{{$row->judul}}</td>
                                            <td>
                                                <a href="{{ route('vidio.edit', $row->id)}}"
                                                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('vidio.destroy', $row->id)}}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Belum Ada Vidio</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            {{ $vidio->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection