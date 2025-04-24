@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Membuat Saran Masukan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Saran
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('admin.laporan.update', $laporan->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="first-name-horizontal">Laporan Pengaduan
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="form-group">
                                                    <select
                                                        class="choices form-select @error('pengaduan_id') is-invalid @enderror"
                                                        name="pengaduan_id">
                                                        @foreach ($pengaduan as $data)
                                                            <option value="{{ $data->id }}"
                                                                {{ $data->id == $laporan->pengaduan_id ? 'selected' : '' }}>
                                                                {{ Str::limit($data->judul, 45, '...') }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('pengaduan_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email-horizontal">Petugas Yang Menangani <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="form-group">
                                                    <select
                                                        class="choices form-select @error('petugas_id') is-invalid @enderror"
                                                        name="petugas_id">
                                                        @foreach ($petugas as $data)
                                                            <option value="{{ $data->id }}"
                                                                {{ $data->id == $laporan->petugas_id ? 'selected' : '' }}>
                                                                {{ $data->user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('petugas_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            {{-- <div class="col-md-4">
                                                Keterangan Laporan <span class="text-danger">*</span>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="form-group mb-3">
                                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                                @error('deskripsi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="first-name-horizontal">Tanggal Selesai
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" id="first-name-horizontal"
                                                    class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai">
                                                @error('tanggal_selesai')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> --}}
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                                                <button class="btn btn-light-secondary me-1 mb-1"><a
                                                        href="{{ route('admin.laporan.index') }}"
                                                        class="text-dark">Kembali</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script src="{{ asset('admin/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('admin/assets/static/js/pages/form-element-select.js') }}"></script>
@endpush
