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
                    <h3>Data Petugas</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Petugas</li>
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
                    <a href="{{ route('admin.petugas.create') }}" class="btn icon icon-left btn-success">
                        Tambah Data Petugas</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Foto</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petugas as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->user->email }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td class="avatar avatar-lg">
                                        <img src="{{ Storage::url($item->foto) }}">
                                    </td>
                                    <td>{{ Str::limit(implode(', ', [$item->alamat, $item->provinsi, $item->kab_kota, $item->kecamatan, $item->kelurahan]), 15, '...') }}
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.petugas.destroy', $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="d-flex justify-content-start gap-2">
                                                <button type="button"
                                                    class="btn icon btn-sm btn-outline-warning rounded-pill"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#border-less{{ $item->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <div class="modal fade text-left modal-borderless" id="border-less{{$item->id}}"
                                                    tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Border-Less</h5>
                                                                <button type="button" class="close rounded-pill"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Bonbon caramels muffin. Chocolate bar oat cake cookie
                                                                    pastry dragée
                                                                    pastry. Carrot cake
                                                                    chocolate tootsie roll chocolate bar candy canes
                                                                    biscuit.
                                                                    Gummies bonbon apple pie fruitcake icing biscuit apple
                                                                    pie jelly-o sweet
                                                                    roll. Toffee sugar
                                                                    plum sugar plum jelly-o jujubes bonbon dessert carrot
                                                                    cake. Cookie
                                                                    dessert tart muffin topping
                                                                    donut icing fruitcake. Sweet roll cotton candy dragée
                                                                    danish Candy canes
                                                                    chocolate bar cookie.
                                                                    Gingerbread apple pie oat cake. Carrot cake fruitcake
                                                                    bear claw. Pastry
                                                                    gummi bears
                                                                    marshmallow jelly-o.
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-primary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="button" class="btn btn-primary ms-1"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Accept</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('admin.petugas.edit', $item->id) }}"
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
