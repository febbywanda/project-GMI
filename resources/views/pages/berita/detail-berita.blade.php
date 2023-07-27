@extends('layouts.frontend')
@section('title', 'Halaman Detail Berita')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-8 mt-5">
                <div class="card" data-aos="fade-up">
                    <div class="card-body">
                        <div class="aboutus-wrapper">
                            <div class="badge-positioned">
                                <span class="badge badge-danger font-weight-bold">{{ $news->kategori->nama_kategori }}</span>
                            </div>
                            <h1>{{ $news->title }}</h1>
                            <p>Penulis: {{ $news->author }} | {{ date('M j, Y', strtotime($news->created_at)) }}</p>
                            <div>
                                <img src="{{ asset('storage/' . $news->gambar_news) }}" alt="banner"
                                    class="img-fluid mb-4" />
                            </div>
                            <p class="font-weight-600 fs-15 text-justify">
                                {!! $news->body !!}
                            </p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-lg-4 mt-2">
                <div class="kategori-berita mt-5">
                    <h4 class="text-primary mt-4">IKLAN</h4>
                    <hr>
                    <img src="{{ asset('pages/images/gmihome.png') }}" alt="" class="d-block w-100 "
                        style="max-height:50vh;">

                    @include('pages.partials._news-categories', ['categories' => $kategori])

                    <div class="kategori-berita mt-3">
                        <div class="berita-terkini">
                            <h4 class="text-primary mt-4">Berita Terkini</h4>
                            <hr>
                            <a href="" style="text-decoration:none;">
                                @foreach ($postTerkini as $row)
                                    <div class="media mt-3">
                                        <img src="{{ asset('storage/' . $row->gambar_news) }}" width="70px"
                                            class="align-self-start mr-3" alt="...">
                                        <div class="media-body">
                                            <a href="{{ route('detail-berita', $row->slug) }}"
                                                style="color:black; text-decoration:none;">
                                                <h6>{{ $row->title }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </a>
                            <a href="{{ url('/berita') }}" style="text-align:center; text-decoration:none;">
                                <p>See more..</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="text-primary mt-5">Berita Lainnya</h3>
        <a href="{{ url('/berita') }}" style="text-decoration:none;">
            <p class="text-right">Lihat Selengkapnya..</p>
        </a>
        <div class="card">
            <div class="card-body">
                @forelse ($beritaLainnya as $row)
                    <div class="row mt-5">
                        <div class="col-sm-4 grid-margin">
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

                        <div class="col-sm-8 grid-margin">
                            <h4 class="mb-2 font-weight-600">
                                <a href="{{ route('detail-berita', $row->slug) }}"
                                    style="text-decoration: none; color:black;">
                                    {{ $row->title }}
                                </a>
                            </h4>
                            <div class="fs-13 mb-2">
                                <p>{{ $row->author }} | {{ date('M j, Y', strtotime($row->created_at)) }}</p>
                            </div>
                            <p class="mb-0">
                                {{ substr(strip_tags($row->body), 0, 100) }}{{ strlen(strip_tags($row->body)) > 100 ? '...' : '' }}
                            </p>
                            <a href="{{ route('detail-berita', $row->slug) }}" class="btn btn-primary btn-sm mt-3">Read
                                more</a>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger">
                        Belum Ada Berita
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
