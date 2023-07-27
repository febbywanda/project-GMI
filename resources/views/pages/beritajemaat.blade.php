@extends('layouts.frontend')
@section('title', 'GMI Manna Helvetia - Sistem Informasi')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide mt-5" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item ">
            <img src="{{asset('pages/images/selamat.png')}}" class="d-block w-100 " style="max-height:50vh;" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('pages/images/kristus.png')}}" class="d-block w-100 " style="max-height:50vh;" alt="...">
        </div>
        <div class="carousel-item active">
            <img src="{{asset('pages/images/gmihome.png')}}" class="d-block w-100 " style="max-height:50vh;" alt="...">
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
            <div class="berita-jemaat mb-3">
                @forelse ($beritajemaat as $row )
                <h2>Berita Jemaat <i>{{$row->judul}}</i></h2>
                <p>Penulis: {{$row->author}} | Posted {{ date('M j, Y', strtotime($row->created_at)) }}</p>
                <hr>
                <p class="font-weight-600 fs-15 text-justify">{!!$row->deskripsi!!}
                </p>
                @empty
                <div class="alert alert-danger">
                    Belum Ada Berita
                </div>
                @endforelse
            </div>

            {{ $beritajemaat->links('vendor.pagination.bootstrap-4') }}
        </div>

        <div class="col-lg-4 mt-2">
            <div class="berita-terkini">
                <h4 class="text-primary mt-4">Berita Terkini</h4>
                <hr>
                <a href="" style="text-decoration:none;">
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

            <div class="ayatharian-berita mt-4">
                <h4 class="text-primary mt-4">Ayat Harian</h4>
                <hr>
                @foreach ($ayatharian as $ayat )
                <div class="sidebar-ayatharia">
                    <p>{{ $ayat->hari }} {{ date('d M Y', strtotime($ayat->tanggal)) }},  {{$ayat->ayat}}</p>
                    <hr>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
</div>


@endsection