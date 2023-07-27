<div class="kategori-berita mt-3">
    <h4 class="text-primary mt-4">Kategori Berita</h4>
    <hr>
    @forelse ($categories as $cat)
        <div class="sidebar-kategori d-flex flex-wrap">
            <a href="{{ url('berita/' . $cat->slug) }}"
                style="color:black; text-decoration:none;">{{ $cat->nama_kategori }}</a>
            <p class="ml-auto text-right"><span class="badge badge-warning">{{ $cat->news->count() }}</span>
            </p>
        </div>
    @empty
        <div class="alert alert-danger">
            Belum Ada Kategori
        </div>
    @endforelse
</div>
