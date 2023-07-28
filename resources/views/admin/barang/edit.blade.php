@extends('layouts.admin')
@section('title', 'Edit Barang')
@section('content')
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				</div>
			</div>
		</div>
			
		<div class="page-inner mt--5">
			<div class="row">
				<div class="col-md-12">
					<div class="card full-height">
						<div class="card-header">
							<div class="card-head-row">
                            <div class="card-title">Edit Barang <b>{{ $barang->nama_barang }}</b></div>
								<a href="{{ route('barang.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
							</div>
						</div>
						<div class="card-body">
                        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="kategori_id">Id </label>
                                    <select type="text" name="kategori_id" class="form-control">
                                        @foreach ($kategori as $item)
                                        @if ($item->id == $news->kategori_id)
                                        <option value="{{ $item->id }} " selected='selected'>{{ $item->nama_kategori }}</option>
                                        @else
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select type="text" name="kategori_id" class="form-control">
                                        @foreach ($kategori as $item)
                                        @if ($item->id == $news->kategori_id)
                                        <option value="{{ $item->id }} " selected='selected'>{{ $item->nama_kategori }}</option>
                                        @else
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $news->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Penulis</label>
                                    <input type="text" name="author" class="form-control" id="title" value="{{ $news->author}}">
                                </div>
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select type="text" name="kategori_id" class="form-control">
                                        @foreach ($kategori as $item)
                                        @if ($item->id == $news->kategori_id)
                                        <option value="{{ $item->id }} " selected='selected'>{{ $item->nama_kategori }}</option>
                                        @else
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select name="is_active" class="form-control" >
                                        <option value="1" {{ $news->is_active == '1' ? 'selected' : '' }}>Publish</option>

                                        <option value="0" {{ $news->is_active == '0' ? 'selected' : '' }}>Draft</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="body">Deskripsi</label>
                                    <textarea name="body" id="editor">{{ $news->body}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_news">Gambar</label>
                                    <input type="file" name="gambar_news" class="form-control" >
                                    <small id="newsHelp" class="form-text text-muted">*Gambar wajib di unggah</small>
                                    <br>
                                    <label for="gambar">Gambar Sebelumnya</label>
                                    <br>
                                    <img src="{{ asset('storage/' . $news->gambar_news) }}" alt="" width="100px">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                                    <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                                </div>
                            </form>   
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
