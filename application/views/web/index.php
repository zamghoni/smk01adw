<?php $ceks = $this->session->userdata('no_pendaftaran'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMK NU 01 Adiwerna - Tegal</title>
		<base href="<?php echo base_url();?>"/>

		<link rel="icon" href="assets/images/download.png" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/faa.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="assets/css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom bxshad">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><img src="img/download.png" alt="Logo" width="38" style="position:absolute;margin-top:-10px;"> <span style="margin-left:50px;">SMK NU 01 ADIWERNA</span> </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio"><i class="fa fa-house"></i> Tentang Sekolah</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about"><i class="fa fa-info-circle"></i> Informasi</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact"><i class="fa fa-phone-square"></i> Kontak Kami</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
      <?php
      if (strtolower($this->uri->segment(1)) == 'logcs') {
        $this->load->view('web/login');
      } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" >
                    <img class="img-responsive" src="img/download.png" style="margin-top:-15%;margin-bottom:-10px;" width="120">
                    <p></p>
                    <div class="intro-text">
                        <span class="name shad" style="font-size:35px">SMK NU 01 ADIWERNA</span>
                        <span class="name shad" style="font-size:24px">Mewujudkan Siswa yang Bertaqwa, Professional, dan Aswaja
</span>
                        <br>
                      <?php if ($web_ppdb->status_ppdb == 'buka') {?>
                        <span class="skills">
                        	<a href="#" class="btn btn-danger btn-lg"><i class="fa fa-file-pdf-o faa-pulse animated"></i> &nbsp;Panduan PPDB Online</a>
                        </span>
                        <br> <br>
                        <hr class="star-light">
												<br>
                        <!-- <h3>Login Calon Siswa Terdaftar di PPDB Online SMK NU 01 ADIWERNA</h3> -->
                        <span>
                         <a href="pendaftaran" class="btn btn-outline btn-lg" style="width:300px;margin:5px;"><i class="fa fa-file faa-pulse animated"></i> &nbsp;Pendaftaran PPDB Online</a>
												 <a href="logcs" class="btn btn-outline btn-lg" style="width:300px;margin:5px;"><i class="fa fa-users faa-pulse animated"></i> &nbsp;<?php if($ceks==''){echo "Login";}else{echo "Panel";} ?> Calon Siswa</a>
												 <br>
                                                 <a href="cbt/" class="btn btn-success outline btn-lg" style="width:300px;margin:5px;"><i class="fa fa-file faa-pulse animated"></i> &nbsp;Ruang Ujian Seleksi</a>
											  </span>
                      <?php }else{ ?>
                        <span class="skills">
                        </span>
                        <br> <br>
                        <hr class="star-light">
												<br>
                        <!-- <h3>Login Calon Siswa Terdaftar di PPDB Online SMK NU 01 ADIWERNA</h3> -->
                        <span>
                         <a href="javascript:void(0);" class="btn btn-success btn-lg" style="margin:5px;"><i class="fa fa-file faa-pulse animated"></i> &nbsp;Pendaftaran PSB Online ditutup</a>
												 <br>
											  </span>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Tentang sekolah</h2>
                    <hr class="star-primary">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-14" style="text-align:justify">
                                   <p><b> VISI </b><p></p>
                        Terwujudnya Lembaga Pendidikan yang Bertaqwa, Professional, dan ASWAJA.
                        
                    </p>
                       <p><b> MISI </b>
                        <ol>
                        <li>Mewujudkan kualitas pengetahuan peserta didik baik secara lahir maupun batin dalam penerapan kehidupan sehari-hari
                        </li>
                        <li>Meningkatkan kompetensi sumber daya manusia yang dimiliki oleh lembaga pendidikan
                        <li>Melaksanakan system pendidikan kejuruan yang mampu menjawab tantangan kehidupan dimasyarakat</li>
                        <li>Mengembangkan pendidikan yang berlandaskan ahlussunah waljama’ah</li>
                        </ol>
                    </p>
                </div/>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Informasi PSB Online</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2" style="text-align:justify">
                    <p>SMK NU 01 ADIWERNA menyediakan PSB secara <i>online</i> diharapkan proses PSB dapat berjalan cepat
                    dan bisa dilakukan dimanapun dan kapanpun selama sesi PSB Online dibuka. Proses pendaftaran calon siswa baru tidak menggunakan formulir konvensional hanya dengan mengakses website PSB Online SMK NU 01 ADIWERNA. </p>
                </div>
                <div class="col-lg-4" style="text-align:justify">
                    <p>Pengisian form PSB Online mohon diperhatikan data yang dibutuhkan yang nantinya akan dipakai dalam proses PSB. Setelah proses pengisian form PSB secara online berhasil dilakukan, calon siswa akan mendapat bukti daftar dengan nomor pendaftaran dan harus disimpan yang akan digunakan untuk proses selanjutnya.</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center page-scroll">
                    <a href="#page-top" class="btn btn-md btn-outline">
                        <i class="fa fa-pencil-square-o "></i> PSB Online
                    </a> &nbsp;&nbsp;
                    <a href="#prosedur" class="btn btn-md btn-outline">
                        <i class="fa fa-tasks"></i> Prosedur PSB Online
                    </a>&nbsp;&nbsp;
                    <a href="logcs" class="btn btn-md btn-outline">
                        <i class="fa fa-sign-in"></i> <?php if($ceks==''){echo "Login";}else{echo "Panel";} ?> Calon Siswa
                    </a>&nbsp;&nbsp;

                </div>
            </div>
        </div>
    </section>

     <section id="prosedur">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Prosedur PSB Online</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top:-10px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                       <img class="img-responsive" src="img/alur_psb_online_baru.jpg" alt="">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="col-lg-12 text-center">
                                <h4>Penjelasan Prosedur PSB Online</h4>
                                <hr class="star-primary">
                                <ol style="font-size:18px;text-align:justify">
                                <li>Calon Siswa mendaftarkan diri atau melakukan <b><a href="pendaftaran">Pendaftaran PSB <i>online</i></a></b> melalui website <b><a href="">PSB SMK NU 01 ADIWERNA</a></b>.</li>
                                <li>Setelah Calon Siswa berhasil melakukan pendaftaran, Calon siswa wajib melakukan <b>Print Out Pendaftaran & Mempersiapkan Kelengkapan Berkas PSB SMK NU 01 ADIWERNA</b>.</li>
                                <li>Calon siswa datang ke SMK NU 01 ADIWERNA untuk <b>VERIFIKASI</b>, membawa <b>Bukti pendaftaran & Kelengkapan Berkas PSB SMK NU 01 ADIWERNA</b>. </li>
                                <li>Panitia PSB melakukan <b>Verifikasi dan Validasi Berkas Pendaftaran</b>.</li>
                                <li>Setelah selesai Calon Siswa Menerima <b>TANDA BUKTI VERIFIKASI</b>.</li>
                                <li>Calon Siswa wajib mengambil <b>Kartu Pendaftaran & Pengecekan Ruang Ujian</b>.</li>
                                <li>Jika Calon Siswa sudah mengambil <b>Kartu Pendaftaran & Pengecekan Ruang Ujian</b> selanjutnya Calon Siswa wajib melakukan <b>TEST tertulis POTENSI AKADEMIK</b>.</li>
																<li>PENGUMUMAN HASIL PSB Online bisa dilihat di Web PSB SMK NU 01 ADIWERNA. Untuk <b>No. Pendaftaran</b> sesuaikan dengan <b>Formulir No. Pendaftaran</b> & <b>Passwordnya</b> yaitu <b>NISN</b> Calon Siswa tersebut.</li>
																<li>Jika Calon Siswa dinyatakan <b>LULUS</b> maka Calon Siswa Wajib <b>Registrasi/Daftar Ulang</b> di <b>SMK NU 01 ADIWERNA</b>.</li>
															</ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
		<section class="success" id="contact">
        <!-- <div class="container"> -->
            <div class="row" style="margin-top:-100px;margin-bottom:-105px;">
                <div class="col-lg-4 text-center">
                  <br><br>
                    <h2>Kontak Kami</h2>
                    <hr class="star-light">
                    <h4>
                         GANG KATES 5 NO. 47 TEMBOK BANJARAN ADIWERNA KAB. TEGAL <br><br>
                    </h4>
                    <span><b><i class="fa fa-phone-square"></i> (0283) 445433</b> </span>
										&nbsp;
                    <span class="eml"><i class="fa fa-envelope"></i> smknu1adw@yahoo.com</span>
                    <br>
                </div>
                <div class="col-lg-8 text-center">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15843.463694964032!2d109.1338886!3d-6.9066318!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x36b618a7a54455fb!2sSmk%20Nu%2001%20Adiwerna!5e0!3m2!1sid!2sid!4v1587059428097!5m2!1sid!2sid" width="100%" height="465" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              	</div>
            </div>
        <!-- </div> -->
    </section>



    <!-- Footer -->
    <footer class="text-center">

        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; <?php echo date('Y'); ?> Sistem Informasi PPDB <a href="#" target="_blank">SMK NU 01 ADIWERNA</a> | Powered By <a href="#" target="_blank">Muhammad Zaky Yulianto</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="assets/js/freelancer.min.js"></script>

</body>
</html>
