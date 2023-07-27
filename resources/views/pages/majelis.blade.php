@extends('layouts.frontend')

@push('styles')
    <style>
        .gallery-item {
            width: 100%;
            height: 400px;
            position: relative;
        }

        .gallery-item .images {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        /* object-fit allows the element to re-size itself. object-position sets the elemnt to focus on the center of the image instead of the default top left*/
        .gallery-item .images img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: 50% 50%;
            cursor: pointer;
            transition: 0.5s ease-in-out;
        }

        .gallery-item:hover .images img {
            overflow: hidden;
            transform: scale(1.1);
        }

        .gallery-item small {
            font-size: 12px;
        }

        .gallery-item .title {
            opacity: 0;
            position: absolute;
            bottom: 10%;
            left: 10%;
            /* transform: translate(-50%, -50%); */
            color: #fff;
            font-size: 18px;
            pointer-events: none;
            z-index: 4;
            transition: 0.3s ease-in-out;
            /* -webkit-backdrop-filter: blur(5px) saturate(1.8); */
            /* backdrop-filter: blur(5px) saturate(1.8); */
            max-width: 80%;
        }

        .gallery-item:hover .title {
            opacity: 1;
            padding: 1em;
            width: 100%;
        }

        .gy-3 {
            row-gap: 1rem;
        }

        .title__name {
            font-weight: bold;
        }
    </style>
@endpush

@section('title', 'Majelis')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    @foreach ($periode as $item)
                        <h1 class="mt-5 text-center">Majelis Periode {{ $item->periode }}</h1>
                    @endforeach
                    <div class="row mt-5 gy-3 ">

                        @foreach ($majelis as $row)
                            <div class="col-md-3">
                                <div class="gallery-item">
                                    <div class="images"><img src="{{ asset('storage/public/majelis/' . $row->foto) }}"
                                            alt="">
                                    </div>
                                    <div class="title">
                                        <h5 class="title__name">{{ $row->nama }} </h5>
                                        <h6>{{ $row->jabatan }}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/js/script.js') }}"></script>
@endpush
