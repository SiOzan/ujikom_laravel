@extends('layouts.admin')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Petugas {{ $petugas->user ? $petugas->user->name : 'Tidak Ada User' }}</h3>
                    <p class="text-subtitle text-muted">A page where users can change profile information</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <img class="card-img-top img-fluid" src="{{ Storage::url($petugas->foto) }}" alt="Card image cap"
                        style="height: 20rem" />
                    <div class="card-body">
                        <h4 class="card-title">Top Image Cap</h4>
                        <p class="card-text">
                            Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut
                            pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate
                            bar
                            chocolate tart dragée.
                        </p>
                        <p class="card-text">
                            Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin.
                        </p>
                        <button class="btn btn-primary block">Update now</button>
                    </div>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <div class="avatar avatar-xl">
                                    <img src="{{ Storage::url($petugas->foto) }}" alt="Avatar">
                                </div>
                                <h3 class="mt-3">{{ $petugas->user ? $petugas->user->name : 'Tidak Ada User' }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="#" method="get">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Your Name" value="John Doe">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Your Email" value="john.doe@example.net">
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Your Phone" value="083xxxxxxxxx">
                                </div>
                                <div class="form-group">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" name="birthday" id="birthday" class="form-control"
                                        placeholder="Your Birthday">
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
