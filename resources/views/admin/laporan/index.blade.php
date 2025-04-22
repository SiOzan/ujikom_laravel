@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/compiled/css/table-datatable.css') }}">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Membuatkan Laporan Untuk Petugas</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.laporan.create') }}" class="btn icon icon-left btn-success">
                        Buat Laporan</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Judul Pengaduan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ Str::limit($item->pengaduan->judul, 25, '...') }}</td>
                                    <td>{{ $item->pengaduan->status }}</td>
                                    <td>
                                        <form action="{{ route('admin.laporan.destroy', $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="d-flex justify-content-start gap-2">
                                                <a href="{{ route('admin.laporan.edit', $item->id) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah"
                                                    class="btn icon btn-sm btn-outline-primary rounded-pill">
                                                    <i data-feather="edit"></i>
                                                </a>
                                                <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Hapus" class="btn icon btn-sm btn-outline-danger rounded-pill"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('script')
    <script src="{{ asset('admin/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/static/js/pages/simple-datatables.js') }}"></script>
@endpush
