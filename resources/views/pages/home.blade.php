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
            <div class="carousel-item active">
                <img src="{{ asset('pages/images/selamat.png') }}" class="d-block w-100 " style="max-height:50vh;"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('pages/images/kristus.png') }}" class="d-block w-100 " style="max-height:50vh;"
                    alt="...">
            </div>
            <div class="carousel-item">
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
                <h2>Selamat Datang</h2>
                <hr>
                <p class="text-justify">Syalom, Salam Sejahtera yang penuh kehangatan dan berkat Tuhan Yesus yang selalu
                    menyertai langkah kehidupan sehari-hari kita, memelihara kehidupan kita dan menyertai Gereja Methodist
                    Mana Helvetia. Saya atas nama Pdt. Netty Aritonang, S.Th selaku Pimpinan Gembala Sidang menyambut baik
                    adanya website ini. Dengan keberadaan Website ini baik jemaat gereja Methodist Manna Helvetia dan
                    siapapun bisa melihat, mengetahui informasi yang diadakan oleh gereja tersebut dan Mengetahui semua
                    informasi mengenai Gereja Methodist Manna Helvetia meliputi sejarah di dirikan Gereja Methodist Manna
                    Helvetia, Jadwal Sermon di setiap sektor, acara ibadah, pelayanan, berita gereja terbaru dan kegiatan
                    lain yang dilaksanakan di Gereja Methodist Manna Helvetia. Dengan adanya website ini pelayanan para
                    jemaat semakin meningkat, semangat, menjangkau kegiatan terbaru yang diadakan di Gereja Methodist Manna
                    Helvetia dimanapun mereka berada dan melaksanakan aktifitasnya. Sekian sambutan hangat yang saya
                    sampaikan, semoga bermanfaat , tetap semangat dan Kiranya Tuhan Yesus menyertai dan memberkati kita
                    semua, Amin.</p>
                <img src="{{ asset('pages/images/gmihome.png') }}" class="d-block w-100 " style="max-height:50vh;"
                    alt="...">

                <div class="container mt-4">
                    <h4>Himbauan</h4>
                    <hr>
                    <ol>
                        <li>
                            Kiranya tetap mematuhi protokol kesehatan baik dirumah dan di luar rumah yang melakukan
                            aktivitas dengan menggunakan masker yang baik dan membawa handsanitizer.
                        </li>
                        <li>
                            ika Merasa suhu badan diatas normal/ demam segera untuk beristirahat dan melakukan pengobatan.
                        </li>
                        <li>
                            Dimohon tetap menonaktifkan handphone saat ibadah berlangsung di Gereja Methodist Manna
                            Helvetia.
                        </li>

                    </ol>
                </div>
            </div>

            <div class="col-lg-4 mt-2">
                <div class="berita-terkini">
                    <h4 class="text-primary mt-4">Berita Terkini</h4>
                    <hr>
                    @forelse ($postTerkini as $row)
                        <a href="{{ route('detail-berita', $row->slug) }}" style="text-decoration:none;">
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
                        </a>
                    @empty
                        <div class="alert alert-info">
                            Belum ada berita
                        </div>
                    @endforelse

                    @if (count($postTerkini) > 5)
                        <a href="{{ route('berita') }}" style="text-align:center; text-decoration:none;">
                            <p>See more..</p>
                        </a>
                    @endif

                </div>

                <div class="kategori-berita mt-5">
                    <h4 class="text-primary mt-4">Ayat Harian</h4>
                    <hr>
                    @forelse ($ayatharian as $ayat)
                        <div class="sidebar-kategori">
                            <p>{{ $ayat->hari }} {{ date('d M Y', strtotime($ayat->tanggal)) }}, {{ $ayat->ayat }}</p>
                            <hr>
                        </div>
                    @empty
                        <div class="alert alert-info">
                            Belum ada ayat harian
                        </div>
                    @endforelse
                </div>
                <div class="kategori-berita mt-5">
                    <h4 class="text-primary mt-4">Buletin</h4>
                    <hr>
                    @forelse ($buletin as $item)
                        <div class="sidebar-kategori">
                            <p>{{ $item->keterangan }}</p>
                            <a href="{{ route('downloadBuletin', $item->id) }}" class="d-flex align-items-center"> <img
                                    src="{{ asset('pages/images/pdf-icon.png') }}" alt="PDF Icon" width="15"
                                    class="mr-1">
                                <span>Download</span></a>
                            <hr>
                        </div>
                    @empty
                        <div class="alert alert-info">
                            Belum ada buletin
                        </div>
                    @endforelse
                    @if (count($buletin) > 5)
                        <a href="{{ route('buletin') }}" style="text-align:center; text-decoration:none;">
                            <p>See more..</p>
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>
    </div>

    <div class="container mt-5">
        <section class="text-center">


            <h3 class="mb-5">Contact us</h3>

            <div class="row">
                <div class="col-sm-7 embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.9021612140177!2d98.63093691430328!3d3.6098583511554017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312e6c25b99f5d%3A0xfa2cb48e3ac05ba3!2sGereja%20Methodist%20Indonesia%2F%20GMI%20Jemaat%20Manna!5e0!3m2!1sid!2sid!4v1669573172374!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-sm-5">
                    <form>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                            <div class="col-sm-10">
                                <input type="subject" class="form-control" id="subject">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="pesan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </section>
    </div>

@endsection
