<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>LaporIn - Layanan Pengaduan Masyarakat</title>
    <meta name="description"
        content="Sampaikan laporan Anda langsung ke instansi pemerintah melalui LaporIn. Mudah, cepat, dan transparan.">
    <meta name="keywords" content="Laporan, Pengaduan, Masyarakat, Pemerintah, Layanan Publik">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('user/assets/img/logo-bg.png') }}" type="image/x-icon">
    <link href="{{ asset('user/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('user/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('user/assets/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('user/assets/img/logo-nbg.png') }}" alt="">
                {{-- <h1 class="sitename">LaporIn</h1> --}}
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Beranda</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#total">Layanan</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1>Layanan Pengaduan Publik Secara Online</h1>
                        <p>Sampaikan laporan Anda langsung ke instansi pemerintah yang berwenang dengan mudah dan cepat.
                        </p>
                        <div class="d-flex">
                            <a href="{{ route('home') }}" class="btn-get-started">Lapor!</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img">
                        <img src="{{ asset('user/assets/img/hero-img.png') }}" class="img-fluid animated"
                            alt="">
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section light-background">

            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('user/assets/img/clients/client-1.png') }}" class="img-fluid"
                            alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('user/assets/img/clients/client-2.png') }}" class="img-fluid"
                            alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('user/assets/img/clients/client-3.png') }}" class="img-fluid"
                            alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('user/assets/img/clients/client-4.png') }}" class="img-fluid"
                            alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('user/assets/img/clients/client-5.png') }}" class="img-fluid"
                            alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('user/assets/img/clients/client-6.png') }}" class="img-fluid"
                            alt="">
                    </div><!-- End Client Item -->

                </div>

            </div>

        </section><!-- /Clients Section -->

        <!-- Services Section -->
        <section id="about" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Tentang Kami</h2>
                <p>LaporIn hadir sebagai solusi digital untuk membantu masyarakat menyampaikan laporan dan keluhan
                    terkait layanan publik secara transparan dan akuntabel.</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <i class="bi bi-pencil-square"></i>
                            <h4>Laporan Pengaduan</h4>
                            <p>Sampaikan keluhan Anda terkait pelayanan publik secara langsung kepada instansi terkait.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <i class="bi bi-info-circle"></i>
                            <h4>Informasi Publik</h4>
                            <p>Dapatkan informasi terkait kebijakan dan prosedur layanan publik di sekitar Anda.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <i class="bi bi-search"></i>
                            <h4>Tracking Laporan</h4>
                            <p>Telusuri status dan perkembangan laporan yang telah Anda kirimkan.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <i class="bi bi-lightning-charge"></i>
                            <h4>Akses Mudah</h4>
                            <p>Akses layanan pengaduan online kapan saja dan di mana saja.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Services Section -->

        <!-- Stats Section -->
        <section id="total" class="stats section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 align-items-center">
                    <div class="col-lg-5">
                        <img src="{{ asset('user/assets/img/stats-img.svg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-7">
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-check-circle"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="232"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Laporan Terselesaikan</strong></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->
                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-envelope"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="521"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Total Laporan Diterima</strong></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->
                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-headset flex-shrink-0"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="1453"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Jam Dukungan</strong></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->
                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-people flex-shrink-0"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="32"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Petugas Aktif</strong></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Stats Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Pertanyaan yang Sering Diajukan</h2>
                <p>Berikut beberapa pertanyaan yang sering muncul terkait penggunaan LaporIn.</p>
            </div><!-- End Section Title -->
            <div class="container">
                <div class="row faq-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-5 d-flex">
                        <i class="bi bi-question-circle"></i>
                        <h4>Bagaimana cara mengirim laporan?</h4>
                    </div>
                    <div class="col-lg-7">
                        <p>Anda cukup klik tombol "Lapor Sekarang", isi formulir pengaduan dengan lengkap, dan kirimkan.
                            Laporan Anda akan diteruskan ke instansi terkait.</p>
                    </div>
                </div><!-- End F.A.Q Item-->
                <div class="row faq-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-5 d-flex">
                        <i class="bi bi-question-circle"></i>
                        <h4>Apakah laporan saya bisa dilacak?</h4>
                    </div>
                    <div class="col-lg-7">
                        <p>Ya, Anda harus <i>login</i> yang bisa digunakan untuk memantau status laporan Anda secara
                            real-time.</p>
                    </div>
                </div><!-- End F.A.Q Item-->

                <div class="row faq-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-lg-5 d-flex">
                        <i class="bi bi-question-circle"></i>
                        <h4>Bagaimana menjaga kerahasiaan identitas pelapor?</h4>
                    </div>
                    <div class="col-lg-7">
                        <p>Identitas Anda akan dirahasiakan dan hanya dapat diakses oleh petugas yang berwenang.</p>
                    </div>
                </div><!-- End F.A.Q Item-->

                <div class="row faq-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="col-lg-5 d-flex">
                        <i class="bi bi-question-circle"></i>
                        <h4>Apakah saya harus membuat akun untuk mengirim laporan?</h4>
                    </div>
                    <div class="col-lg-7">
                        <p>Ya, disarankan agar Anda juga bisa memantau status laporan dan mendapatkan notifikasi
                            terbaru.</p>
                    </div>
                </div><!-- End F.A.Q Item-->

                <div class="row faq-item" data-aos="fade-up" data-aos-delay="500">
                    <div class="col-lg-5 d-flex">
                        <i class="bi bi-question-circle"></i>
                        <h4>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h4>
                    </div>
                    <div class="col-lg-7">
                        <p>
                            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est
                            ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing
                            bibendum est. Purus gravida quis blandit turpis cursus in
                        </p>
                    </div>
                </div><!-- End F.A.Q Item-->

            </div>

        </section><!-- /Faq Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
                <p>Jika Anda mengalami kendala atau memiliki pertanyaan, jangan ragu untuk menghubungi kami.</p>
            </div><!-- End Section Title -->
            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Alamat:</h3>
                                <p>Jl. Pelayanan Publik No. 123, Jakarta, Indonesia</p>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Telepon:</h3>
                                <p>+62 812-3456-7890</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email:</h3>
                                <p>info@laporin.id</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-7">
                        <form action="{{ route('saran.store') }}" method="POST" data-aos="fade-up"
                            data-aos-delay="500">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="nama" value="{{ old('nama') }}"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Masukan nama lengkap anda">
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 ">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}"
                                        placeholder="Masukan alamat email anda">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" value="{{ old('judul') }}" placeholder="Subjek">
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="6"
                                        placeholder="Pesan">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 text-center" style="margin-top: 20px;">
                                    <button type="submit" class="btn"
                                        style="background-color: #3498db; color: white; padding: 12px 30px; font-size: 16px; border: none; border-radius: 8px; box-shadow: 0 4px 10px rgba(79, 70, 229, 0.3); transition: all 0.3s ease;">
                                        Kirim Pesan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><!-- End Contact Form -->
                </div>
            </div>
        </section><!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <strong>LaporIn</strong> <span>All Rights Reserved</span></p>
            </div>
            <div class="credits">
                Designed by <a href="https://github.com/SiOzan">Padev</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('user/assets/js/main.js') }}"></script>

</body>

</html>
