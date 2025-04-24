@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-circle"></i>
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card shadow-lg rounded-4 border-0 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-header bg-gradient-primary text-white text-center p-4 rounded-top">
                        <h3 class="fw-bold">{{ __('Form Pengaduan Masalah') }}</h3>
                        <p class="lead">Laporkan masalah Anda dengan cepat dan mudah</p>
                    </div>

                    <div class="card-body p-5">
                        <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">
                                <!-- Nama Lengkap -->
                                <div class="col-md-6 col-12 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="form-group">
                                        <label for="nama" class="form-label fs-6 fw-semibold">Nama Lengkap <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" value="{{ old('nama') }}"
                                            placeholder="Masukkan nama lengkap Anda" aria-describedby="namaHelp">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Alamat Email -->
                                <div class="col-md-6 col-12 wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="form-group">
                                        <label for="email" class="form-label fs-6 fw-semibold">Alamat Email</label>
                                        <input type="email" class="form-control" value="{{ Auth::user()->email }}"
                                            placeholder="Email Anda" disabled>
                                        <input type="hidden" name="masyarakat_id" value="{{ Auth::user()->id }}">
                                    </div>
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="col-md-6 col-12 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="form-group">
                                        <label for="telepon" class="form-label fs-6 fw-semibold">Nomor Telepon <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" class="form-control @error('telepon') is-invalid @enderror"
                                            name="telepon" value="{{ old('telepon') }}"
                                            placeholder="Masukkan nomor telepon Anda">
                                        @error('telepon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Kategori Pengaduan -->
                                <div class="col-md-6 col-12 wow fadeInUp" data-wow-delay="0.6s">
                                    <div class="form-group">
                                        <label for="kategori_id" class="form-label fs-6 fw-semibold">Kategori Pengaduan
                                            <span class="text-danger">*</span></label>
                                        <select class="form-select @error('kategori_id') is-invalid @enderror"
                                            name="kategori_id">
                                            @foreach ($kategoriPengaduan as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Prioritas Masalah -->
                                <div class="col-md-6 col-12 wow fadeInUp" data-wow-delay="0.7s">
                                    <div class="form-group">
                                        <label for="prioritas" class="form-label fs-6 fw-semibold">Prioritas Masalah <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('prioritas') is-invalid @enderror"
                                            name="prioritas">
                                            <option value="Rendah">Rendah</option>
                                            <option value="Sedang">Sedang</option>
                                            <option value="Tinggi">Tinggi</option>
                                        </select>
                                        @error('prioritas')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Foto Bukti Laporan -->
                                <div class="col-12 wow fadeInUp" data-wow-delay="0.8s">
                                    <div class="form-group">
                                        <label for="bukti" class="form-label fs-6 fw-semibold">Foto Bukti Laporan</label>
                                        <input class="form-control @error('bukti') is-invalid @enderror" type="file"
                                            name="bukti">
                                        @error('bukti')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr>

                                <!-- Judul Masalah -->
                                <div class="col-12 wow fadeInUp" data-wow-delay="0.9s">
                                    <label for="judul" class="form-label fs-6 fw-semibold">Judul Masalah <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul masalah">
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi Masalah -->
                                <div class="col-12 wow fadeInUp" data-wow-delay="1s">
                                    <label for="deskripsi" class="form-label fs-6 fw-semibold">Deskripsi Masalah <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                                        placeholder="Jelaskan secara rinci masalah yang Anda alami">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Lokasi Masalah -->
                                <div class="col-12 wow fadeInUp" data-wow-delay="1.1s">
                                    <label for="lokasi" class="form-label fs-6 fw-semibold">Alamat Lokasi Masalah <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" rows="3"
                                        placeholder="Masukkan alamat lokasi masalah">{{ old('lokasi') }}</textarea>
                                    @error('lokasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-end wow fadeInUp" data-wow-delay="1.2s">
                                    <button type="submit"
                                        class="btn btn-gradient-primary px-5 py-2 shadow-sm rounded-3">Kirim
                                        Pengaduan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
    <style>
        .card-header {
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
        }

        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.6);
        }

        .btn-gradient-primary {
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-gradient-primary:hover {
            background: linear-gradient(90deg, #2575fc 0%, #6a11cb 100%);
            transform: scale(1.05);
        }

        .form-select,
        .form-control {
            transition: border-color 0.3s ease;
        }
    </style>
@endsection
