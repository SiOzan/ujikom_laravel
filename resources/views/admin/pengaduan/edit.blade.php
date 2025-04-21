@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Membuat Laporan Pengaduan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Pengaduan
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
                                <form class="form" action="{{ route('admin.pengaduan.update', $pengaduan->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                                <input
                                                    type="text"class="form-control @error('nama') is-invalid @enderror"
                                                    name="nama" value="{{ old('nama', $pengaduan->nama) }}"
                                                    placeholder="Masukan nama lengkap anda">
                                                @error('nama')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Alamat Email</label>
                                                <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                                    placeholder="Auto select email pelapor sesuai akun :P" disabled>
                                                <input type="hidden" name="masyarakat_id" value="{{ Auth::user()->id }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Nomor Telepon <span class="text-danger">*</span></label>
                                                <input
                                                    type="tel"class="form-control @error('telepon') is-invalid @enderror"
                                                    value="{{ old('telepon', $pengaduan->telepon) }}" name="telepon"
                                                    placeholder="Masukan nomor telepon anda">
                                                @error('telepon')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Kategori Pengaduan <span class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select
                                                        class="choices form-select @error('kategori_id') is-invalid @enderror"
                                                        name="kategori_id">
                                                        @foreach ($kategoriPengaduan as $data)
                                                            <option value="{{ $data->id }}"
                                                                {{ $data->id == $pengaduan->kategori_id ? 'selected' : '' }}>
                                                                {{ $data->nama_kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('kategori_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <h6>Tentukan Prioritas Masalahnya <span class="text-danger">*</span></h6>
                                            <div class="input-group mb-3">
                                                <select class="form-select @error('prioritas') is-invalid @enderror"
                                                    name="prioritas" id="inputGroupSelect01">
                                                    <option value="Rendah" selected>Rendah</option>
                                                    <option value="Sedang">Sedang</option>
                                                    <option value="Tinggi">Tinggi</option>
                                                </select>
                                                <label class="input-group-text" for="inputGroupSelect01">Pilih</label>
                                                @error('prioritas')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        @if ($pengaduan->bukti)
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Bukti Laporan</label>
                                                    <input class="form-control @error('bukti') is-invalid @enderror"
                                                        type="file" id="formFile" name="bukti">
                                                    @error('bukti')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12">
                                                <img src="{{ Storage::url($pengaduan->bukti) }}" style="width: 4rem;">
                                            </div>
                                        @else
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Foto Bukti Laporan</label>
                                                    <input class="form-control @error('bukti') is-invalid @enderror"
                                                        type="file" id="formFile" name="bukti">
                                                    @error('bukti')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif


                                        <hr class="mt-1">
                                        <h4>Laporan Masalah</h4>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Judul Masalah Yang Ingin Diajukan
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal"
                                                class="form-control @error('judul') is-invalid @enderror" name="judul"
                                                value="{{ old('judul', $pengaduan->judul) }}"
                                                placeholder="Masukan judul saran">
                                            @error('judul')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            Keterangan Terkait Laporan Masalah <span class="text-danger">*</span>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="form-group mb-3">
                                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                                    id="exampleFormControlTextarea1" rows="5">{{ old('deskripsi', $pengaduan->deskripsi) }}</textarea>
                                                @error('deskripsi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            Alamat Lokasi Tempat Yang Ingin Dilaporkan <span class="text-danger">*</span>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="form-group mb-3">
                                                <textarea class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" id="exampleFormControlTextarea1"
                                                    rows="5">{{ old('lokasi', $pengaduan->lokasi) }}</textarea>
                                                @error('lokasi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                                            <button class="btn btn-light-secondary me-1 mb-1"><a
                                                    href="{{ route('admin.pengaduan.index') }}"
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
