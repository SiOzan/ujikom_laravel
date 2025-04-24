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
                    <h3>Kontak Saran</h3>
                    <p class="text-subtitle text-muted">Daftar saran dan masukan dari Masyarakat.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Saran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    {{-- <h5 class="card-title">
                                    Simple Datatable
                                </h5> --}}
                    <a href="{{ route('admin.saran.create') }}" class="btn icon icon-left btn-success">
                        Tambah Saran</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Judul Saran</th>
                                <th>Deskripsi Saran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($saran as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ Str::limit($item->judul, 15, '...') }}</td>
                                    <td>{{ Str::limit($item->deskripsi, 30, '...') }}</td>
                                    <td>
                                        <form action="{{ route('admin.saran.destroy', $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="me-1 mb-1 d-inline-block">
                                                <!-- Button trigger for large size modal -->
                                                <button type="button"
                                                    class="btn icon btn-sm btn-outline-warning rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#large{{ $item->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <!--large size Modal -->
                                                <div class="modal fade text-left" id="large{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel17">
                                                                    {{ $item->judul }}
                                                                </h4>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Nama : {{ $item->nama }}
                                                                </p>
                                                                <p>
                                                                    Email : {{ $item->email }}
                                                                </p>
                                                                <br>
                                                                <p>
                                                                    "{{ $item->deskripsi }}"
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Tutup</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Hapus" class="btn icon btn-sm btn-outline-danger rounded-pill"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                        {{-- <span class="badge bg-success">Active</span> --}}
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
