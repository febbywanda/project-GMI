@extends('layouts.frontend')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-carousel.css') }}">
@endpush

@section('title', 'Halaman Tentang')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" data-aos="fade-up">
                        <div class="card-body">
                            <div class="aboutus-wrapper">
                                @foreach ($sejarah as $row)
                                    <h1 class="mt-5">
                                        Sejarah Gereja
                                    </h1>
                                    <p class="font-weight-600 fs-15 mt-3 text-justify">
                                        {!! $row->deskripsi !!}
                                    </p>
                                    <img src="{{ asset('storage/' .$row->gambar) }}" alt="banner"
                                        class="img-fluid mb-5" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-12">
                    <h2 class="text-center">Pendeta</h2>
                    <div class="container text-center my-3">
                        <div class="row mx-auto my-auto">
                            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                                <div class="carousel-inner w-100" role="listbox">
                                    @foreach ($pendeta as $row)
                                        <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }} ">
                                            <div class="col-md-4">
                                                <div class="card card-body">
                                                    <img class="img-fluid"
                                                        src="{{ asset('storage/public/pendeta/' . $row->gambar) }}">
                                                    <h4 class="text-sm mt-2">{{ $row->nama }}</h4>
                                                    <p>{{ $row->masa_jabatan }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle"
                                        aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle"
                                        aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/js/script.js') }}"></script>
@endpush
