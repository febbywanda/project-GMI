@extends('layouts.frontend')
@section('title', 'GMI Manna Helvetia - Sistem Informasi')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.9.0/baguetteBox.min.css"
        integrity="sha512-tbjZFdjHyHckTfeqkgVFcQ3GJWVfdsNYFvl+rEWmofjj9JpWaohlZgq0Vb6Hav5rqIL019LFpLsE+sTNSfNVXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
@endpush

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide mt-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item ">
                <img src="{{ asset('pages/images/selamat.png') }}" class="d-block w-100 " style="max-height:50vh;"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('pages/images/kristus.png') }}" class="d-block w-100 " style="max-height:50vh;"
                    alt="...">
            </div>
            <div class="carousel-item active">
                <img src="{{ asset('pages/images/gmihome.png') }}" class="d-block w-100 " style="max-height:50vh;"
                    alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="font-weight-bold mt-4 text-primary">Gallery Foto </h2>
                <div class="row ">
                    <div class="tz-gallery">
                        <div class="row">
                            <div class="gallery-wrapper">
                                @foreach ($foto as $row )
                                <div class="w-3 h-2">
                                    <div class="gallery-item">
                                        <a href="{{ asset('storage/public/foto/' . $row->gambar)  }}"
                                            class="lightbox">
                                            <div class="images"><img
                                                    src="{{ asset('storage/public/foto/' . $row->gambar) }}"
                                                    alt="">
                                            </div>
                                            <div class="title">
                                                <small>{{ date('M j, Y', strtotime($row->created_at)) }}</small>
                                                <h3>{{ $row->deskripsi }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            {{ $foto->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-2">
            <div class="berita-terkini">
                <h4 class="text-primary mt-4">Berita Terkini</h4>
                <hr>
                @forelse ($postTerkini as $row )
                    <div class="media mt-3">
                        <img src="{{asset('storage/' . $row->gambar_news)}}" width="70px" class="align-self-start mr-3"
                            alt="...">
                        <div class="media-body">
                            <a href="{{route('detail-berita', $row->slug)}}" style="color:black; text-decoration:none;">
                                <h6>{{ $row->title }}</h6>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-danger">
                        Belum Ada Berita
                    </div>
                    @endforelse
                </a>
                <a href="{{ url('/berita') }}" style="text-align:center; text-decoration:none;">
                    <p>See more..</p>
                </a>
            </div>

            @include('pages.partials._news-categories', ['categories' => $kategori])

        </div>
        </div>

    </div>
    </div>


@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.9.0/baguetteBox.min.js"
        integrity="sha512-+8LoWbC6Y9Vy85wapJUYlRvabpzAIGhgiL6vZWNHn0F8EFJ43a1BCSzXo7b7OeY6bczJ3Q+ifRweZpW1iPAARg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        baguetteBox.run('.tz-gallery');
    </script>
@endpush
