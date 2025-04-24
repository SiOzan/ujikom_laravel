@extends('layouts.petugas')

@section('content')
    <div class="page-heading">
        <h3>Data Pekerjaan</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldFilter"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Tugas</h6>
                                        <h6 class="font-extrabold mb-0">{{ $tugasBaru }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldDocument"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Sedang Dikerjakan</h6>
                                        <h6 class="font-extrabold mb-0">{{ $tugasProses }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldFolder"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Selesai Dikerjakan</h6>
                                        <h6 class="font-extrabold mb-0">{{ $tugasSelesai }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Latest Comments</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Judul Pengaduan</th>
                                                <th>Deskripsi Pengaduan</th>
                                                <th>Prioritas</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tugas as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->pengaduan->nama }}</td>
                                                    <td>{{ Str::limit($item->pengaduan->judul, 15, '...') }}</td>
                                                    <td>{{ Str::limit($item->pengaduan->deskripsi, 30, '...') }}</td>
                                                    <td>{{ $item->pengaduan->prioritas }}</td>
                                                    <td>{{ $item->pengaduan->status }}</td>
                                                    <td>
                                                        <form action="{{ route('petugas.kerjakan', $item->id) }}"
                                                            method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="d-flex justify-content-start gap-2">
                                                                <button type="submit"
                                                                    class="btn icon btn-sm btn-outline-success rounded-pill"
                                                                    onclick="return confirm('Kerjakan tugas sekarang?')">
                                                                    Kerjakan
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
