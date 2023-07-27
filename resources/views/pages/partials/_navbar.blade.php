  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-primary">
      <div class="container">
          <a class="navbar-brand text-white" href="{{ url('/') }}"><b>GMI MANNA HELVETIA</b></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <a class="nav-link text-white" href="{{ url('/') }}">Beranda</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white" href="{{ url('/komsel') }}">Kebaktian Sektor</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Berita
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="nav-link" href="{{ url('/berita-jemaat') }}">Berita Jemaat</a>
                          <a class="nav-link" href="{{ url('/berita') }}">Berita Artikel</a>
                      </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Galeri
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="nav-link" href="{{ url('/galeri-foto') }}">Foto</a>
                          <a class="nav-link" href="{{ url('/galeri-video') }}">Video</a>
                      </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Tentang Kami
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="nav-link" href="{{ url('/about') }}">Sejarah</a>
                          <a class="nav-link" href="{{ url('/majelis') }}">Majelis</a>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white" href="{{ url('/buletin') }}">Buletin</a>
                  </li>
              </ul>
              <!-- <form class="form-inline my-2 my-lg-0" action="/pegawai/cari" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
          </div>
      </div>
  </nav>
