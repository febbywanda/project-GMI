@extends('layouts.frontend')
@section('title', 'Halaman Berita')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-8 mt-5">
                @foreach ($beritaTerbaru as $row)
                    <div class="card">
                        <a href="{{ route('detail-berita', $row->slug) }}" style="color:black; text-decoration:none;"><img
                                src="{{ asset('storage/' . $row->gambar_news) }}" class="card-img-top" alt="..."></a>
                        <div class="card-body">
                            <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                {{ $row->kategori->nama_kategori }}
                            </div>
                            <a href="{{ route('detail-berita', $row->slug) }}" style="color:black; text-decoration:none;">
                                <h3>{{ $row->title }}</h3>
                            </a>
                            <p class="card-text"><small class="text-muted">Last updated
                                    {{ date('M j, Y', strtotime($row->created_at)) }}</small></p>
                        </div>
                    </div>
                @endforeach
                <h3 class="text-primary mt-5">Berita Lainnya</h3>
                <div class="card mt-2">
                    <div class="card-body">
                        @forelse ($news as $row)
                            <div class="row">
                                <div class="col-sm-4 grid-margin mt-3">
                                    <div class="position-relative">
                                        <div class="rotate-img">
                                            <img src="{{ asset('storage/' . $row->gambar_news) }}" alt="thumb"
                                                class="img-fluid" />
                                        </div>
                                        <div class="badge-positioned">
                                            <span
                                                class="badge badge-danger font-weight-bold">{{ $row->kategori->nama_kategori }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-8 grid-margin mt-3 ">
                                    <h2 class="mb-2 font-weight-600">
                                        <a href="{{ route('detail-berita', $row->slug) }}"
                                            style="text-decoration: none; color:black;">
                                            {{ $row->title }}
                                        </a>
                                    </h2>
                                    <div class="fs-13 mb-2">
                                        <p>{{ $row->author }} | {{ date('M j, Y', strtotime($row->created_at)) }}</p>
                                    </div>
                                    <p class="mb-0">
                                        {{ substr(strip_tags($row->body), 0, 100) }}{{ strlen(strip_tags($row->body)) > 100 ? '...' : '' }}
                                    </p>
                                    <a href="{{ route('detail-berita', $row->slug) }}"
                                        class="btn btn-primary btn-sm mt-3">Read
                                        more</a>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger">
                                Belum Ada Berita
                            </div>
                        @endforelse
                    </div>

                    {{ $news->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>

            <div class="col-lg-4 mt-2">
                <div class="kategori-berita mt-5">
                    <h4 class="text-primary mt-4">IKLAN</h4>
                    <hr>
                    <img src="{{ asset('pages/images/gmihome.png') }}" alt="" class="d-block w-100 "
                        style="max-height:50vh;">

                    @include('pages.partials._news-categories', ['categories' => $kategori])
                </div>
            </div>

        </div>
    </div>
@endsection
