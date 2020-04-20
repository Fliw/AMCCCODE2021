<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CODE 2020</title>
    <link rel="icon" href="{{ asset('code2020/img/amcc.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('code2020/vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('code2020/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('code2020/vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('code2020/vendors/linericon/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('code2020/vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('code2020/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.8/typed.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('code2020/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('code2020/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('code2020/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('code2020/css/utama.css') }}">

</head>

<body>
    <div class="preloader">
        <div class="loader">
            <span class="box"></span>
            <span class="box"></span>
            <div class="code">
                <img src="{{ asset('code2020/img/amcc.png') }}" width="120px">
            </div>
            <span class="txt">LOADING CODE...</span>

        </div>
    </div>
    <script>
        $('.preloader').delay(5000).fadeOut(500);

    </script>
    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="#"><img width="100px"
                            src="{{ asset('code2020/img/logo.png') }}" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-end">
                            <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ route('ticket.index') }}">E-Ticket</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a>
                            <li class="nav-item"><a class="nav-link" href="#benefit">Benefit</a></li>
                            <li class="nav-item"><a class="nav-link" href="#lomba">Lomba</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tanggal">Tanggal</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->


    <main class="side-main">
        <!--================ Hero sm Banner start =================-->
        <section id="home" class="hero-banner mb-30px utama">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-banner__img">
                            <img class="img-fluid"
                                src="{{ asset('code2020/img/banner/hero-banner.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 pt-5">
                        <div class="hero-banner__content">
                            <h1>>_<span id="typed"></span></h1>
                            <div class="text-center">
                                <p>Code Adalah Rangkaian Acara Kompetisi Antar Mobile Developer, IT Business Idea Dan Web Developer Serta
                                    Seminar Bertaraf Nasional.</p>
                                <a class="button buttonCode"
                                    href="{{ route('team.register') }}">Registrasi Tim</a>
                                <a class="button buttonCode"
                                    href="{{ route('ticket.index') }}">Seminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Feature section start =================-->
        <img src="{{ asset('code2020/img/bannerBawah.jpg') }}" id="bannerBawah" width="100%">
        <img src="{{ asset('code2020/img/codeplace.png') }}" id="CodeAtas" width="80%">
        <section id="tentang" class="section-margin">
            <div class="container">
                <div class="section-intro pb-85px text-center" data-aos="zoom-in-up" data-aos-delay="200">
                    <h2 class="section-intro__title">Apa itu CODE?</h2>
                    <p class="section-intro__subtitle">CODE (Competition of Developer) Adalah Serangkaian Acara Yang
                        Berisikan Kompetisi Antar Developer, IT Business dan Seminar Nasional,
                        Dengan Mengusung Tema
                        <br><br>
                        <i class="warnaTextCode">"Smart Digital Technology With Code"</i>
                        <br><img src="{{ asset('code2020/img/maskot.png') }}"
                            width="100px"><br><br>
                        Kita Percaya Bahwa Kita Dapat Membantu Mengembangkan Bangsa ini dengan Teknologi Smart Digital,
                        Sehingga Nantinya Indonesia Akan Menjadi Bangsa Yang Terdepan Dalam Inovasi Dunia Digital.
                        <br>Dibantu Oleh Para Pembicara Yang Ahli Dalam Bidang Teknologi, Kita Optimis Dapat Mempererat
                        Persatuan Antar Devs Dan Membantu Negeri Ini.
                    </p>

                </div>
                <div id="benefit" class="container">
                    <h2 class="section-intro__title">Kenapa Ikut CODE?</h2>
                    <div class="row">
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200">
                            <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon">
                                    <img src="{{ asset('code2020/img/idea.png') }}" width="60px">
                                </span>
                                <h3 class="card-feature__title">Dapat Menyalurkan Ide</h3>
                                <p class="card-feature__subtitle">Ide Kalian Dapat Tersalurkan, Diapresiasi dan
                                    Diwujudkan Bersama.</p>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200">
                            <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon">
                                    <img src="{{ asset('code2020/img/teach.png') }}" width="60px">
                                </span>
                                <h3 class="card-feature__title">Berbagi Bagi Ilmu</h3>
                                <p class="card-feature__subtitle">Kalian Dapat Membagi Ilmu Dan Mendapatkan Ilmu Bersama
                                    Orang Yang Lebih Berpengalaman.</p>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200">
                            <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon">
                                    <img src="{{ asset('code2020/img/book.png') }}" width="60px">
                                </span>
                                <h3 class="card-feature__title">Pengalaman Bertambah</h3>
                                <p class="card-feature__subtitle">Pengalaman Kalian Akan Bertambah Ketika Mengikuti
                                    Event Ini, Selain Itu Kalian Pun Dapat Mengimprovisasi Skill Teamwork Kalian.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <center>
                <div id="lomba" class="container">
                    <h2 class="section-intro__title">Acara Yang Dilombakan</h2>
                    <div class="row mx-auto">
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200"
                            style="float:none;margin:auto;">
                            <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon text-center">
                                    <img src="{{ asset('code2020/img/android.png') }}"
                                        width="60px">
                                </span>
                                <h3 class="card-feature__title text-center">Mobile Development</h3>
                                <p class="card-feature__subtitle text-center">Menciptakan aplikasi berbasis mobile
                                    secara kreatif dan inovatif.</p>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200"
                            style="float:none;margin:auto;">
                            <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon text-center">
                                    <img src="{{ asset('code2020/img/ide.png') }}" width="60px">
                                </span>
                                <h3 class="card-feature__title text-center">IT Business Idea</h3>
                                <p class="card-feature__subtitle text-center">menciptakan ide dan gagasan guna
                                    memecahkan permasalahan bisnis di Indonesia.</p>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200"
                            style="float:none;margin:auto;">
                            <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon text-center">
                                    <img src="{{ asset('code2020/img/web.png') }}" width="60px">
                                </span>
                                <h3 class="card-feature__title text-center">Web Development</h3>
                                <p class="card-feature__subtitle text-center">Menciptakan sebuah aplikasi berbasis web
                                    yang mampu memberikan dampak positif terhadap permasalahan yang ada</p>
                            </div>
                        </div>
                    </div>
            </center>
        </section>
        <!--================ Feature section end =================-->

        <!--================ about section start =================-->

        <!--================ about section end =================-->

        <!-- ================ start footer Area ================= -->
        <footer class="footer-area section-gap">
            <section id="tanggal" class="section-padding--small">
                <div class="container">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-5 mb-5 mb-md-0" data-aos="zoom-in-up" data-aos-delay="200">
                            <div class="about__content">
                                <h2 class="text-white">Kapan CODE Akan Dilaksanakan?</h2>
                                <p>Jadwal Acara CODE selengkapnya Dapat Dilihat Dibawah ini:</p>
                            </div>
                        </div>
                        <div class="col-md-7" data-aos="zoom-in-up">
                            <div class="about__img">
                                <img class="img-fluid"
                                    src="{{ asset('code2020/img/timeline.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <div class="container ">
                <div class="panel-group" id="faqAccordion">
                    <br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question0">
                            <h2 class="text-white">FaQ (Frequently Asked Question)</h2>
                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Kak ini kompetisinya offline ya? Sedangkan kondisi lagi
                                    pandemik COVID-19.</a>
                            </h4>

                        </div>
                        <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p>Halo sobat CODE 2020. Kami optimis kalau pandemik ini akan usai secepatnya. Jadi,
                                    kita tetap mengadakannya secara offline sobat.
                                    Tapi, tenang aja ya...
                                    Ketika nanti wabah ini belum usai, uang pendaftaran sobat Code 2020 akan
                                    dikembalikan kok. :)

                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question1">

                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Kak, uang pendaftaran kami apakah akan kembali 100%, jika
                                    ada suatu halangan?
                                </a>
                            </h4>

                        </div>
                        <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p>Halo sobat CODE 2020, tentu saja kami akan mengembalikan uang pendaftaran peserta
                                    100%. Jika ada suatu halangan dan sobat sudah konfirmasi ke kami. :)

                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question2">

                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Kak, kalo nanti ada peserta lomba berasal dari luar jogja,
                                    apakah ada paket transportasi penginapan dan penjemputan ya?
                                </a>
                            </h4>

                        </div>
                        <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p> Halo sobat CODE 2020. Maaf ya, untuk saat ini kami tidak menyediakan paket
                                    transportasi penjemputan dan penginapan. Tetapi kami sudah memberikan rekomendasi
                                    untuk penginapannya kok. :)

                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question3">

                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Kak, untuk mengikuti TM nanti apakah harus full team ya?
                                    atau boleh perwakilan?</a>
                            </h4>

                        </div>
                        <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p>Halo sobat CODE 2020, untuk mengikuti TM boleh perwakilan dari team yaaa. Tetapi
                                    diusahakan full team yaa sobat. :)

                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question4">

                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Kak, apakah peserta lomba yang tidak juara juga akan
                                    mendapatkan sertifikat?
                                </a>
                            </h4>

                        </div>
                        <div id="question4" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p>Halo sobat CODE 2020, untuk semua peserta nanti akan mendapatkan sertifikat sebagai
                                    partisipan yaaa. :)

                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question5">

                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Kak, untuk informasi syarat dan ketentuan nya gimana ya ?
                                </a>
                            </h4>

                        </div>
                        <div id="question5" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p>Halo sobat CODE 2020, untuk informasi S&K bisa klik link
                                    bit.ly/InfoSyaratKetentuanCODE2020 ya sobat, bisa juga dengan membacanya di Rulebook
                                    kompetisi ya, di link berikut ini : bit.ly/rulebookCODE2020


                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question6">

                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Kak, ada benefit dapet gebetan nggak?</a>
                            </h4>

                        </div>
                        <div id="question6" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p>Halo sobat CODE 2020, tentu saja jika sobat beruntung :)

                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question7">

                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Kak, apakah boleh jika hanya mengikuti lomba saja, tapi
                                    tidak ikut seminar?
                                </a>
                            </h4>

                        </div>
                        <div id="question7" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p> Halo sobat CODE 2020, jika hanya mengikuti lomba saja diperbolehkan kok. Silahkan
                                    tunggu informasi selanjutnya yaah. :)

                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question8">

                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Rangkaian acaranya berlangsung berapa hari ya Kak?
                                </a>
                            </h4>

                        </div>
                        <div id="question8" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p> Halo sobat CODE 2020, untuk acaranya akan berlangsung selama 3 hari yaaa. :)

                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question9">

                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Kak kalo misal program yang sudah dibuat tapi pas hari H
                                    belum selesai bagaimana?
                                </a>
                            </h4>

                        </div>
                        <div id="question9" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p>Halo sobat CODE 2020, diusahakan harus selesai yah sobat karena akan ditampilkan saat
                                    pitching nanti.

                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question10">
                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Kak yang mempengaruhi faktor penilaiannya apa saja ya?

                                </a>
                            </h4>

                        </div>
                        <div id="question10" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p> Halo sobat CODE 2020, untuk faktor-faktor penilaiannya sudah kita cantumkan pada
                                    Rulebook ya. Silahkan cek kembali. :)

                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question11">
                            <h4 class="panel-title">
                                <a class="ing text-white">Q: Kak untuk yang kategori IT Business apakah harus bisnis
                                    yang sudah berjalan?
                                </a>
                            </h4>

                        </div>
                        <div id="question11" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>

                                <p>Halo sobat CODE 2020, untuk lomba kategori IT Business tidak harus yang sudah atau
                                    sedang berjalan, bisa masih berupa ide atau rancangan bisnis sobat. Dan nanti sobat
                                    akan mempresentasikan prototipe nya saat lomba.

                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/panel-group-->
            </div>


            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mb-5 mb-md-0">
                        <div class="about__content">
                            <h2 class="text-white">Sponsor</h2>
                            <p>Acara ini Didukung Oleh :</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="about__img text-center">
                            <img src="{{ asset('code2020/img/logo.png') }}" width="300px">
                        </div>
                    </div>
                    <div class="footer-bottom row align-items-center text-center text-lg-left">
                        <p class="footer-text m-0 col-lg-8 col-md-12">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());

                            </script> All rights reserved <br>
                            <p style="color:#0e1424">| This template is made with <i class="fa fa-heart"
                                    aria-hidden="true"></i> by <a style="color:#0e1424" href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                    </div>
                </div>
        </footer>
        <script type="text/javascript">
            AOS.init();
            var typed = new Typed("#typed", {
                strings: ['Competition.<span style="color:#ffe271;">WebDevs()',
                    'IT Business <span style="color:#ffe271;">Idea.',
                    'Competition.<span style="color:#ffe271;">MobDevs()',
                    'National <span style="color:#ffe271;">Seminar.'
                ],
                typeSpeed: 20,
                backSpeed: 30,
                startDelay: 1000,
                backDelay: 2000,
                loop: true
            });

        </script>
        <!-- ================ End footer Area ================= -->
        <script src="{{ asset('code2020/vendors/bootstrap/bootstrap.bundle.min.js') }}">
        </script>
        <script src="{{ asset('code2020/vendors/owl-carousel/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('code2020/js/mail-script.js') }}"></script>
        <script src="{{ asset('code2020/js/main.js') }}"></script>
</body>

</html>
