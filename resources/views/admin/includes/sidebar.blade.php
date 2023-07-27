<div class="sidebar sidebar-style-2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="{{ asset('admin/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
						{{ Auth::user()->name }}
							<span class="user-level">Administrator</span>
						</span>
					</a>
				</div>
			</div>
			<ul class="nav nav-primary">
			<li class="nav-item {{ Request::is('dashboard') ? 'active' : ''}}">
					<a href="{{ url('/dashboard') }}">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Component Berita</h4>
				</li>
				<li class="nav-item {{ Request::is('kategori') ? 'active' : ''}}">
					<a href="{{route('kategori.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Kategori</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('news') ? 'active' : ''}}">
					<a href="{{route('news.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Berita</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Component Gereja</h4>
				</li>
				<li class="nav-item {{ Request::is('sektor') ? 'active' : ''}}">
					<a href="{{route('sektor.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Kebaktian Sektor</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('beritajemaat') ? 'active' : ''}}">
					<a href="{{route('beritajemaat.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Berita Jemaat</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('ayatharian') ? 'active' : ''}}">
					<a href="{{route('ayatharian.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Ayat Harian</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('buletin-info') ? 'active' : ''}}">
					<a href="{{route('buletin-info.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Buletin</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('sejarah') ? 'active' : ''}}">
					<a href="{{route('sejarah.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Sejarah</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('majelis') ? 'active' : ''}}">
					<a href="{{route('majelis-info.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Majelis</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Inventaris</h4>
				</li>
				<li class="nav-item {{ Request::is('golongan') ? 'active' : ''}}">
					<a href="{{route('golongan.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Golongan</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('ruangan') ? 'active' : ''}}">
					<a href="{{route('ruangan.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Ruangan</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('merk') ? 'active' : ''}}">
					<a href="{{route('merk.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Merk</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('status') ? 'active' : ''}}">
					<a href="{{route('status.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Status</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('barang') ? 'active' : ''}}">
					<a href="{{route('barang.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Barang</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('daftaraset') ? 'active' : ''}}">
					<a href="{{route('daftaraset.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Daftar Aset</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('pemeliharaanaset') ? 'active' : ''}}">
					<a href="{{route('pemeliharaanaset.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Pemeliharaan Aset</p>
					</a>
				</li>
				<li class="nav-item {{ Request::is('penghapusanaset') ? 'active' : ''}}">
					<a href="{{route('penghapusanaset.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Penghapusan Aset</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Component Gallery</h4>
				</li>
				<li class="nav-item {{ Request::is('vidio') ? 'active' : ''}}">
					<a href="{{route('vidio.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Vidio</p>
					</a>
				</li>
				<li class="nav-item {{Request::is('foto') ? 'active' : ''}}">
					<a href="{{route('foto.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Foto</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>