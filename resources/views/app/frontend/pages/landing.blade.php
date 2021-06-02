<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CODE 2021</title>
    <link rel="icon" href="{{ asset('code2020/img/amcc.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('code2020/vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('code2020/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('code2020/vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('code2020/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('code2020/vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('code2020/vendors/owl-carousel/owl.carousel.min.css') }}">
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
        //adding delayed modal
        // $(window).on('load', function() {
        //     setTimeout(function(){
        //         $("#modalAwal").modal('show');
        //     },8000);
        // });

        $(document).ready(function() {
            $('.preloader').fadeOut(500);
        });

    </script>
    <!-- Modal Awal -->
    <div class="modal fade" id="modalAwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Announcement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('code2020/img/poster.jpg') }}" alt="poster" width="100%" class="rounded">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Oke Kak !</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal awal -->
    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="#"><img width="120px"
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
                            <li class="nav-item"><a class="nav-link" href="{{ route('ticket.index') }}">E-Ticket</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a>
                            <li class="nav-item"><a class="nav-link" href="#benefit">Benefit</a></li>
                            <li class="nav-item"><a class="nav-link" href="#lomba">Lomba</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tanggal">Tanggal</a></li>
                            <li class="nav-item"><a class="nav-link btn btn-outline-danger"
                                    href="http://bit.ly/rulebookCODE2020" target="_blank">Rulebook Lomba</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->


    <main class="side-main" style="z-index:-100">
        <!--================ Hero sm Banner start =================-->

        <section class="hero-banner mb-30px utama" id="home">
            <div id="particles-js" style="position:absolute; width:100%; height:100%;margin-top:-300px"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 pt-5">
                        <div class="hero-banner__content">
                            <h1 style="font-size:50px;"> >_<span id="typed"></span></h1>
                            <div>
                                <p style="font-size:20px;">Code Adalah Rangkaian Acara Kompetisi Antar Mobile Developer,
                                    IT Business Idea Dan Web Developer Serta
                                    Seminar Bertaraf Nasional.</p>
                                <a class="button buttonCode text-white " href="{{ route('team.login') }}">Login
                                    Dashboard Tim</a>
                                <a class="button buttonCode text-white ml-3" href="/tickets/seminar-nasional">Daftar
                                    CODE 2021</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">

                        <img width="85%" style="margin-left:150px;" class="img-fluid pl-5"
                            src="{{ asset('code2020/img/amcc.png') }}" alt="">

                    </div>

                </div>
            </div>
        </section>
        <!--================ Feature section start =================-->
        <img src="{{ asset('code2020/img/gelombangputih.png') }}"
            style="margin-top:-200px;z-index:1; position:absolute;" id="bannerBawah" width="100%">
        <section id="tentang" class="section-margin">
            <div class="container">
                <div class="section-intro pb-85px text-center" data-aos="zoom-in-up" data-aos-delay="200">
                <img class="mx-auto mb-4" src="{{ asset('code2020/img/logo.png') }}" style="margin-top:100px;" width="400px">
                    <h1 class="section-intro__title">Apa itu CODE?</h1>
                    <p class="section-intro__subtitle">CODE (Competition of Developer) Adalah Serangkaian Acara Yang
                        Berisikan Kompetisi Antar Developer, IT Business dan Seminar Nasional,
                        Dengan Mengusung Tema
                        <br><br>
                        <i class="warnaTextCode">"Smart Digital Technology With Code"</i>
                        <br><br>
                        Karena dengan adanya dunia Digital yang sudah maju dan berkembang.<br>Kita telah dimudahkan
                        untuk menjelajah dunia termasuk dunia digital itu sendiri. <br> sehingga nantinya diharapkan
                        kita sebagai generasi penerus bangsa dapat menjelajah dan mengembangkan inovasi di dalam dunia
                        digital itu sendiri. <br> dibantu oleh para pembicara yang ahli dalam bidang teknologi, kita
                        optimis dapat mempererat persatuan antar developer dan membantu perubahan pada negeri ini.
                    </p>

                </div>
                <div id="benefit" class="container">
                    <h2 class="section-intro__title">Alasan Ikut CODE?</h2>
                    <div class="row">
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200">
                            <div style="height:300px;" class=" card card-feature text-center text-lg-left mb-5 mb-lg-0">
                                <span class="card-feature__icon">
                                    <img src="{{ asset('code2020/img/idea.png') }}" width="60px">
                                </span>
                                <h3 class="card-feature__title">Dapat Menyalurkan Ide</h3>
                                <p class="card-feature__subtitle">Ide Kalian Dapat Tersalurkan, Diapresiasi dan
                                    Diwujudkan.</p>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200">
                            <div style="height:300px;" class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon">
                                    <img src="{{ asset('code2020/img/teach.png') }}" width="60px">
                                </span>
                                <h3 class="card-feature__title">Berbagi Ilmu</h3>
                                <p class="card-feature__subtitle">Kalian akan mendapatkan ilmu dan kalian bisa
                                    membagikan ilmu bersama orang yang lebih berpengalaman dalam bidangnya.</p>
                            </div>
                        </div>
                        <div  class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200">
                            <div style="height:300px;" class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon">
                                    <img src="{{ asset('code2020/img/book.png') }}" width="60px">
                                </span>
                                <h3 class="card-feature__title">Bertambahnya pengalaman</h3>
                                <p class="card-feature__subtitle">Pengalaman Kalian Akan Bertambah Ketika Mengikuti
                                    Event Ini, Selain Itu Kalian Pun Dapat mengasah Skill dan Teamwork Kalian.</p>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200">
                            <div style="height:300px;" class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon">
                                    <img src="{{ asset('code2020/img/productive.png') }}" width="60px">
                                </span>
                                <h3 class="card-feature__title">Lebih Produktif</h3>
                                <p class="card-feature__subtitle">
                                    dengan masih terbatasnya aktivitas diluar rumah kalian bisa menggali kemampuan yang
                                    kalian miliki dengan mengikuti CODE
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200">
                            <div style="height:300px;" class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon">
                                    <img src="{{ asset('code2020/img/challenge.png') }}" width="60px">
                                </span>
                                <h3 class="card-feature__title">Hadiah Jutaan Rupiah</h3>
                                <p class="card-feature__subtitle">
                                    menangkan hadiah total jutaan rupiah
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200">
                            <div style="height:300px;" class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon">
                                    <img src="{{ asset('code2020/img/challenge.png') }}" width="60px">
                                </span>
                                <h3 class="card-feature__title">Tantangan Baru</h3>
                                <p class="card-feature__subtitle">
                                    tantangan ini berupa kompetisi yang dilakukan secara online
                                </p>
                            </div>
                        </div>
                    </div>

            </div>
        </section>
        <section style="margin-bottom: 64px;">
            <center>
                <div id="lomba" class="container">
                    <h2 class="section-intro__title">Acara Yang Dilombakan</h2>
                    <div class="row mx-auto">
                        <div class="col-lg-4" data-aos="zoom-in-up" data-aos-delay="200"
                            style="float:none;margin:auto;">
                            <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                                <span class="card-feature__icon text-center">
                                    <img src="{{ asset('code2020/img/android.png') }}" width="60px">
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
        <footer class="footer-area section-gap" style="padding-bottom: 0">
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
                                <img class="img-fluid" src="{{ asset('code2020/img/timeline.png') }}" alt="">
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
                                <a class="ing text-white">
                                    Q: Kak, kompetisi CODE ini dilaksanakan secara online atau offline?
                                </a>
                            </h4>

                        </div>
                        <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>
                                <p>
                                    Halo sobat CODE! dikarenakan adanya himbauan darurat COVID-19
                                    dari pemerintah membuat kita tidak dapat berjumpa secara langsung,
                                    sehingga keseluruhan acara CODE 2020 akan dilaksanakan secara online.
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

                                <p>
                                    Halo sobat CODE 2020. Maaf ya, untuk saat ini kami tidak menyediakan paket
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

                                <p>
                                    Halo sobat CODE 2020, untuk mengikuti TM boleh perwakilan dari team yaaa.
                                    Tetapi diusahakan full team yaa sobat. :), untuk TM akan di lakukan melalui media
                                    conference ya kak, nanti panitia akan meng-infokan.
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

                                <p>
                                    Halo sobat CODE 2020, Jadi untuk peserta yang gagal menuju tahap selanjutnya
                                    akan mendapatkan e-sertifikat, dengan catatan peserta harus lolos ditahap2 (submit
                                    video).
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

                                <p>
                                    Halo sobat CODE 2020, Seminar nasional merupakan fasilitas bagi peserta lomba
                                    yang lolos menuju tahap semifinal ( submit video ). Silahkan tunggu informasi
                                    selanjutnya ya kak :)
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

                                <p>
                                    Halo sobat CODE 2020, diusahakan harus selesai yah sobat, karena pada proposal
                                    peserta diwajibkan menyantumkan implementasi aplikasi.
                                    Jadi Implementasi aplikasi itu semacam prototype / produk hasil jadi.
                                    <br /><br />
                                    Sesuai ketentuan, jika itu kategori mobile dan web ( diharapkan juga menyantumkan
                                    hasil produk jadi si aplikasi itu ),
                                    namun jika kategori IT Business ( bisa menyantumkan prototype produk itu).
                                    <br /><br />
                                    Nah untuk pertanyaan, apakah aplikasi itu harus sudah selesai saat pengumpulan
                                    proposal?
                                    Itu lebih bagus lagi, karena produk yang di implementasikan didalam proposal itu
                                    sudah matang.
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
                                <a class="ing text-white">
                                    Q: Kak untuk yang kategori IT Business apakah harus bisnis yang sudah berjalan?
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
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question12">
                            <h4 class="panel-title">
                                <a class="ing text-white">
                                    Q: Min, rulebooknya apakah ada perubahan isi ya? karena acara yang berubah juga jadi
                                    Online Competition?
                                </a>
                            </h4>
                        </div>
                        <div id="question12" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>
                                <p>
                                    Halo sobat CODE 2020, iyap betul sekali. <br />
                                    Rulebook online sedang dalam proses ya sobat.
                                    Tetap pantau IG AMCC (<a href="https://instagram.com/amccamikom"
                                        target="_blank">@amccamikom</a>) secara berkala
                                    untuk mengetahui informasi update-an selanjutnya :)
                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question13">
                            <h4 class="panel-title">
                                <a class="ing text-white">
                                    Q: Min, link media conferencenya apakah akan dicantumkan di rulebook ya?
                                </a>
                            </h4>
                        </div>
                        <div id="question13" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>
                                <p>
                                    Hallo Sobat CODE 2020, untuk link nya tidak kami share melalui rulebook ya Sobat..
                                    Jadi, nanti link media conference akan kami infokan pada peserta lomba yang sudah
                                    lolos di tahap 2 (submit video) yak :)
                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question14">
                            <h4 class="panel-title">
                                <a class="ing text-white">
                                    Q: Min, nanti jika peserta lomba gagal menuju tahap selanjutnya, apakah juga tetap
                                    mendapatkan fasilitas Seminar Nasional ya?
                                </a>
                            </h4>
                        </div>
                        <div id="question14" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>
                                <p>
                                    Hallo Sobat CODE 2020, untuk fasilitas SEMNAS hanya diperuntukkan bagi
                                    peserta lomba yang sudah lolos di tahap 2 (submit video) yak :)..
                                    Jadi untuk peserta lomba yang gagal menuju tahap selanjutnya dan menginginkan
                                    untuk join acara SEMNAS, bisa mendaftarkan diri sebagai peserta seminar nasional
                                    pada link
                                    yang tertera di poster semnas.
                                    Cek informasi secara berkala di IG AMCC (<a href="https://instagram.com/amccamikom"
                                        target="_blank">@amccamikom</a>) ya sobat :)
                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question15">
                            <h4 class="panel-title">
                                <a class="ing text-white">
                                    Q: Min, nanti model pitchingnya itu seperti apa ya min? kan acara kita online nih?
                                </a>
                            </h4>
                        </div>
                        <div id="question15" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>
                                <p>
                                    Hallo Sobat CODE 2020, nah untuk pitchingnya nanti tiap tim akan presentasi langsung
                                    didepan juri,
                                    dengan menyalakan kamera media conference. Karena kita ada 3 kategori lomba,
                                    jadi nanti pitching dilakukan pada link media conference berdasarkan kategori lomba
                                    yang akan panitia infokan.
                                </p>
                            </div>
                        </div>
                    </div><br>
                    <div class="panel panel-default ">
                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                            data-parent="#faqAccordion" data-target="#question16">
                            <h4 class="panel-title">
                                <a class="ing text-white">
                                    Q: Min, kalau pitching sinyal buruk bagaimana ya?
                                </a>
                            </h4>
                        </div>
                        <div id="question16" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <h5><span class="label label-primary text-white">Answer</span></h5>
                                <p>
                                    Hallo Sobat CODE 2020, panitia berharap untuk koneksinya dipastikan aman ya sobat :)
                                    Tapi jangan naik tower ya sobat.. Keselamatan tetap nomor 1
                                </p>
                            </div>
                        </div>
                    </div><br>

                </div>
                <!--/panel-group-->
            </div>

            <div class="mediasponsor section-gap"
                style="background: #fff; width: 100%; padding: 24px 0 24px 0; margin-top: 48px;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h4 style="margin-bottom: 16px;">Sponsored by</h4>
                            <img style="margin-right: 15px;"
                                src="{{ asset('code2020/img/sponsor/niagahoster.png') }}" width="96" />
                            <img style="margin-right: 15px;" src="{{ asset('code2020/img/sponsor/citranet.png') }}"
                                width="96" />
                            <img style="margin-right: 15px;" src="{{ asset('code2020/img/sponsor/jenius.png') }}"
                                width="96" />
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <h4 style="margin-bottom: 16px;">Media Partner</h4>
                            <img style="margin: 0 15px 15px 0" src="{{ asset('code2020/img/mediapartner/1.png') }}"
                                width="48" />
                            <img style="margin: 0 15px 15px 0" src="{{ asset('code2020/img/mediapartner/2.png') }}"
                                width="48" />
                            <img style="margin: 0 15px 15px 0" src="{{ asset('code2020/img/mediapartner/3.png') }}"
                                width="48" />
                            <img style="margin: 0 15px 15px 0" src="{{ asset('code2020/img/mediapartner/4.png') }}"
                                width="48" />
                            <img style="margin: 0 15px 15px 0" src="{{ asset('code2020/img/mediapartner/5.png') }}"
                                width="48" />
                            <img style="margin: 0 15px 15px 0" src="{{ asset('code2020/img/mediapartner/6.png') }}"
                                width="48" />
                            <img style="margin: 0 15px 15px 0" src="{{ asset('code2020/img/mediapartner/7.png') }}"
                                width="48" />
                            <img style="margin: 0 15px 15px 0" src="{{ asset('code2020/img/mediapartner/8.png') }}"
                                width="48" />
                            <img style="margin: 0 15px 15px 0" src="{{ asset('code2020/img/mediapartner/9.png') }}"
                                width="48" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
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
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        <script type="text/javascript">
            AOS.init();
            var typed = new Typed("#typed", {
                strings: ['Competition.<span style="color:#F55553; text-shadow:0px 0px 10px #F55553">WebDevs()',
                    'IT Business <span style="color:#F55553;text-shadow:0px 0px 10px #F55553">Idea.',
                    'Competition.<span style="color:#F55553;text-shadow:0px 0px 10px #F55553">MobDevs()',
                    'National <span style="color:#F55553;text-shadow:0px 0px 10px #F55553">Seminar.'
                ],
                typeSpeed: 20,
                backSpeed: 30,
                startDelay: 1000,
                backDelay: 2000,
                loop: true
            });
            particlesJS("particles-js", {
                "particles": {
                    "number": {
                        "value": 100,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#ffffff"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "grab"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 140,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            });


            /* ---- stats.js config ---- */

            var count_particles, stats, update;
            stats = new Stats;
            stats.setMode(0);
            stats.domElement.style.position = 'absolute';
            stats.domElement.style.left = '0px';
            stats.domElement.style.top = '0px';
            document.body.appendChild(stats.domElement);
            count_particles = document.querySelector('.js-count-particles');
            update = function() {
                stats.begin();
                stats.end();
                if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                    count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
                }
                requestAnimationFrame(update);
            };
            requestAnimationFrame(update);

        </script>
        <!-- ================ End footer Area ================= -->
        <script src="{{ asset('code2020/vendors/bootstrap/bootstrap.bundle.min.js') }}">
        </script>
        <script src="{{ asset('code2020/vendors/owl-carousel/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('code2020/js/mail-script.js') }}"></script>
        <script src="{{ asset('code2020/js/main.js') }}"></script>

</body>

</html>
