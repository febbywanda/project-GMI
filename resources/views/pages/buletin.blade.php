@extends('layouts.frontend')
@section('title', 'Kebaktian Sektor')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide mt-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('pages/images/gmihome.png') }}" class="d-block w-100 " style="max-height:50vh;"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('pages/images/selamat.png') }}" class="d-block w-100 " style="max-height:50vh;"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('pages/images/kristus.png') }}" class="d-block w-100 " style="max-height:50vh;"
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
            <div class="col-lg-8 table-responsive-lg">
                <h2>Buletin</h2>
                <form action="/komsel" class="form-inline d-flex justify-content-end mb-2" method="GET">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Cari tanggal '13'"
                        aria-label="Search">
                </form>

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($buletin as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td> <a href="{{ route('downloadBuletin', $item->id) }}" class="btn btn-success">Download</a>
                                </td>
                            </tr>

                            
                        @empty
                            <div class="alert alert-danger">
                                Belum Ada Buletin
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>


            <div class="col-lg-4 mt-2">
                <div class="berita-terkini">
                    <h4 class="text-primary mt-4">Berita Terkini</h4>
                    <hr>
                    <a href="" style="text-decoration:none;">
                        @forelse ($postTerkini as $row)
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


            </div>
        </div>
    </div>
@endsection
