@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <a href="{{route('news.index')}}" style="text-decoration: none">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-info bubble-shadow-small">
                                            <i class="far fa-newspaper"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Berita</p>
                                            <h4 class="card-title">{{$news->count()}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="{{route('kategori.index')}}" style="text-decoration: none">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="fas fa-tags"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Kategori Berita</p>
                                            <h4 class="card-title">{{$kategori->count()}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="{{route('vidio.index')}}" style="text-decoration: none">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fas fa-file-video"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category ">Video</p>
                                            <h4 class="card-title">{{$vidio->count()}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="{{route('foto.index')}}" style="text-decoration: none">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-file-image"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Foto</p>
                                            <h4 class="card-title">{{$foto->count()}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-4">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Materi Video</div>
                            </div>
                        </div>
                        <div class="card-body">


                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Playlist Video</div>
                            </div>
                        </div>
                        <div class="card-body">


                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Draft Artikel</div>
                            </div>
                        </div>
                        <div class="card-body">


                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">GMI MANNA HELVETIA</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <iframe class="embed-responsive-item"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.9021612140177!2d98.63093691430328!3d3.6098583511554017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312e6c25b99f5d%3A0xfa2cb48e3ac05ba3!2sGereja%20Methodist%20Indonesia%2F%20GMI%20Jemaat%20Manna!5e0!3m2!1sid!2sid!4v1669573172374!5m2!1sid!2sid"
                                    width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection