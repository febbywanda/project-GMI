@extends('layouts.frontend')
@section('title', 'Halaman Berita')

@section('content')
    <div class="container mt-3">
        <div class="row">
            @if ($errorMessage)
                <div class="col-lg-8 mt-2">
                    <h3 class="mt-5">{{ $errorMessage }}</h3>
                </div>
            @else
                <div class="col-lg-8 mt-2">
                    <div class="container">
                        <h2 class="font-weight-bold mt-5 text-primary">Berita Tentang {{ $categoryName }}
                        </h2>
                        <div class="row">
                            @foreach ($newsByCategory as $news)
                                <div class="col-lg-6 col-md-6 mb-4 mb-lg-2">
                                    <div class="card rounded shadow-sm border-0">
                                        <div class="card-body p-2"><a href="{{ route('detail-berita', $news->slug) }}"><img
                                                    src="{{ asset('storage/' . $news->gambar_news) }}" alt=""
                                                    class="img-fluid d-block mx-auto mb-3"></a>
                                            <small class="date-text">{{ $news->author }} |
                                                {{ date('M j, Y', strtotime($news->created_at)) }}</small>
                                            <h5>
                                                <a href="{{ route('detail-berita', $news->slug) }}" class="text-dark">


                                                    {{ $news->title }}
                                                </a>
                                            </h5>
                                            <p class="mb-0">
                                                {{ substr(strip_tags($news->body), 0, 100) }}{{ strlen(strip_tags($news->body)) > 100 ? '...' : '' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $newsByCategory->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            @endif
            <div class="col-lg-4 mt-2">
                <div class="kategori-berita mt-5">
                    <h4 class="text-primary mt-4">IKLAN</h4>
                    <hr>
                    <img src="{{ asset('pages/images/gmihome.png') }}" alt="" class="d-block w-100 "
                        style="max-height:50vh;">

                    @include('pages.partials._news-categories')
                </div>
            </div>
        </div>
    </div>
@endsection
