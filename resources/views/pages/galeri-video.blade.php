@extends('layouts.frontend')
@section('title', 'GMI Manna Helvetia - Vidio')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
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
            <h2 class="font-weight-bold mt-4 text-primary">Gallery Video </h2>
            <div class="row mt-5">

                @foreach ($vidio as $item )
                <div class="col-md-4">
                    <div class="">
                        <a data-fancybox="video-gallery" href="{{$item->link}}"><img class="img-fluid"
                                src="{{ asset('storage/public/vidio/' . $item->gambar) }}">
                            <p>{{ $item->judul }}</p>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
            {{ $vidio->links('vendor.pagination.bootstrap-4') }}
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





@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
@endpush