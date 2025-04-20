@extends('layouts.admin')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Membuat Akun Petugas</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                User
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                <form class="form form-horizontal" action="{{ route('admin.user.update', $user->id) }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="first-name-horizontal">Nama <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="first-name-horizontal"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name', $user->name) }}" autocomplete="name"
                                                    placeholder="Masukan nama pengguna">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email-horizontal">Email <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="email" id="email-horizontal"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email', $user->email) }}" autocomplete="email"
                                                    name="email" placeholder="Masukan alamat email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="role-horizontal">Kata Sandi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" class="form-control" id="disabledInput"
                                                    placeholder="Mohon maaf untuk saat ini belum bisa merubah Kata Sandi"
                                                    disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="role-horizontal">Role</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" class="form-control" id="disabledInput"
                                                    value="Petugas" placeholder="Petugas" disabled>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1"><a
                                                        href="{{ route('admin.user.index') }}"
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
        <!-- // Basic multiple Column Form section end -->
    </div>
@endsection
