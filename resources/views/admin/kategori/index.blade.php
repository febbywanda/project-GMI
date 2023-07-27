@extends('layouts.admin')
@section('title', 'Kategori')
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
                                    <div class="card-title">Data Kategori</div>
                                    <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm ml-auto"><i
                                            class="fas fa-plus"></i> &nbsp; Tambah Kategori</a>
                                </div>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kategori</th>
                                                <th>Slug</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($kategori as $index => $row)
                                                <tr>
                                                    <td>{{ $index + $kategori->firstItem() }}</td>
                                                    <td>{{ $row->nama_kategori }}</td>
                                                    <td>{{ $row->slug }}</td>
                                                    <td>
                                                        <a href="{{ route('kategori.edit', $row->id) }}"
                                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#deleteConfirmModal"
                                                            onclick="deleteData({{ $row->id }})"
                                                            data-action="{{ route('kategori.destroy', $row->id) }}"><i
                                                                class="fas fa-trash"></i></button>

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Belum Ada Kategori</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                {{ $kategori->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal --}}
                <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog"
                    aria-labelledby="deleteConfirmModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteConfirmModalTitle">Hapus Kategori</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus kategori ini? <br>
                                <small class="text-danger">*Berita yang menggunakan kategori ini juga akan
                                    terhapus.</small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                <form method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="modal-confirm_delete" class="btn btn-danger">Hapus</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('js')
        <script>
            $('#deleteConfirmModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var action = button.data('action');
                var modal = $(this);
                modal.find('form').attr('action', action);
            });
        </script>
    @endpush
