@extends('layouts.admin')
@section('title', 'Sejarah')
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
                            @if (count($sejarah) == 0)
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">Sejarah Gereja</div>
                                        <a href="{{ route('pendeta.index') }}" class="btn btn-success btn-sm ml-auto"><i
                                                class="fas fa-eye"></i> &nbsp; Lihat Pendeta</a>
                                        <a href="{{ route('sejarah.create') }}" class="btn btn-primary btn-sm ml-auto"><i
                                                class="fas fa-edit"></i> &nbsp; Tambah Sejarah</a>
                                    </div>
                                </div>
                            @else
                                @foreach ($sejarah as $item)
                                    <div class="card-header">
                                        <div class="card-head-row">
                                            <div class="card-title">Sejarah Gereja</div>
                                            <a href="{{ route('pendeta.index') }}" class="btn btn-success btn-sm ml-auto"><i
                                                    class="fas fa-eye"></i> &nbsp; Lihat Pendeta</a>
                                            <a href="{{ route('sejarah.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm ml-auto"><i class="fas fa-edit"></i> &nbsp;
                                                Edit Sejarah</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <p class="text-justify font-weight-600 fs-15 mt-3 ">
                                            {!! $item->deskripsi !!}
                                            </p>
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="banner"
                                                class="img-fluid mb-5" />
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
