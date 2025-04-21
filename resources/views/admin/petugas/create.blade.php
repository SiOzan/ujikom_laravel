@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Membuat Data Petugas</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Petugas
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('admin.petugas.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Akun petugas <span class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select
                                                        class="choices form-select @error('user_id') is-invalid @enderror"
                                                        name="user_id">
                                                        @foreach ($akunPetugas as $data)
                                                            <option value="{{ $data->id }}">{{ $data->email }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('user_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Nama Petugas</label>
                                                <input type="text" class="form-control" id="disabledInput"
                                                    placeholder="Auto select name petugas sesuai akun :P" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Nomor Telepon <span class="text-danger">*</span></label>
                                                <input
                                                    type="tel"class="form-control @error('telepon') is-invalid @enderror"
                                                    name="telepon" placeholder="Masukan nomor telepon petugas">
                                                @error('telepon')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Foto Petugas <span class="text-danger">*</span></label>
                                                <input class="form-control @error('foto') is-invalid @enderror"
                                                    type="file" id="formFile" name="foto">
                                                @error('foto')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <hr class="mt-3">
                                        <h4>Alamat Petugas</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="provinsi">Masukan provinsi <span
                                                            class="text-danger">*</span></label>
                                                    <input
                                                        type="text"class="form-control @error('provinsi') is-invalid @enderror"
                                                        name="provinsi" placeholder="Isi sesuai dengan alamat domisili">
                                                    @error('provinsi')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kabupaten">Masukan Kabupaten/Kota <span
                                                            class="text-danger">*</span></label>
                                                    <input
                                                        type="text"class="form-control @error('kab_kota') is-invalid @enderror"
                                                        name="kab_kota" placeholder="Isi sesuai dengan alamat domisili">
                                                    @error('kab_kota')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kecamatan">Masukan Kecamatan <span
                                                            class="text-danger">*</span></label>
                                                    <input
                                                        type="text"class="form-control @error('kecamatan') is-invalid @enderror"
                                                        name="kecamatan" placeholder="Isi sesuai dengan alamat domisili">
                                                    @error('kecamatan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kelurahan">Masukan Kelurahan/Desa <span
                                                            class="text-danger">*</span></label>
                                                    <input
                                                        type="text"class="form-control @error('kelurahan') is-invalid @enderror"
                                                        name="kelurahan" placeholder="Isi sesuai dengan alamat domisili">
                                                    @error('kelurahan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat Lengkap <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="exampleFormControlTextarea1"
                                                rows="3"></textarea>
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                                            <button class="btn btn-light-secondary me-1 mb-1"><a
                                                    href="{{ route('admin.petugas.index') }}"
                                                    class="text-dark">Kembali</a></button>
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
