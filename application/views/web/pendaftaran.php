<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
		<base href="<?php echo base_url();?>"/>
    <link rel="shortcut icon" href="img/download.png" type="image/png">
    <title>Form Pendaftaran</title>
    <link rel="icon" href="img/download.png" type="image/x-icon" />
    <link href="assets/kitkat/assets/css/style.css" rel="stylesheet">
    <link href="assets/kitkat/assets/css/theme.css" rel="stylesheet">
    <link href="assets/kitkat/assets/css/ui.css" rel="stylesheet">
    <link href="assets/kitkat/assets/css/custom.css" rel="stylesheet">
    <link href="assets/kitkat/assets/plugins/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet">
    <link href="assets/kitkat/assets/input/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />

    <!-- BEGIN PAGE STYLE -->
    <link href="assets/kitkat/assets/plugins/step-form-wizard/css/step-form-wizard.min.css" rel="stylesheet">
    <!-- END PAGE STYLE -->
    <script src="assets/kitkat/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  
  <style>
    #pesan_komentar{font-weight: bold;color:red;}
  </style>
  <body class="fixed-topbar theme-sdtl color-green  sidebar-hover">
   
    <section>

      <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <div class="topbar" style="background-color:#2b9c54;color:#fff;">
          <div class="header-left">
            <div class="col-sm-12">
              <div style="margin-top:-8px;">
              <h2>
								<strong class="text-primary">
									<a href=""><span style="margin-left:20px;color:#fff;">Form Pendaftaran</span></a>
								</strong>
							</h>
              </div>
            </div>

          </div>
          <div class="header-right">
            <ul class="header-menu nav navbar-nav">
              <!-- BEGIN USER DROPDOWN -->
              <li class="dropdown" id="language-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <span style="color:#ddd;">PPDB Tahun Ajaran <b class="text-danger" style="color:#fff;"><?php echo date('Y'); ?>-<?php echo date('Y')+1; ?></b></span>
                </a>
              </li>
            </ul>
          </div>

          <!-- header-right -->
        </div>
      <div>
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-wizard">

          <div class="header" style="margin-top:-20px;">
            <h2>Form Pendaftaran Online <strong> SMK NU 01 ADIWERNA</strong></h2>
            <hr style="margin-top:5px;">

          </div>
          <div class="row" style="margin-top:-30px;">
            <div class="col-lg-12">

              <div class="tabs tabs-linetriangle">

                <div class="tab-content">
                  <div class="tab-pane active" id="style">
                    <?php
                    echo $this->session->flashdata('msg');
                    ?>
                    <div class="wizard-div current wizard-sea" id="register">
                      <form role="form" class="wizard wizard-validation" data-style="sea" role="form" action="" enctype="multipart/form-data"  method="post">
                        <fieldset>
                               <legend>Ketentuan</legend>

                               <div class="col-md-2"></div>
                               <div class="col-md-8">
																 	<?php $this->load->view('web/step/1'); ?>
                                   <div class="col-md-12" >
                                       <span class="text-primary" style="font-size:18px;color:#222;"><strong>Apakah anda setuju dengan ketentuan diatas..?</strong></span>
                                       <div class="form-group" style="padding-bottom:30px;">
                                          <div class="radio bg-success" style="padding-top:10px;padding-bottom:10px;border-radius:3px;color:#222;" >
                                             <label>
                                               <input type="radio" value="cek" name="cek" data-parsley-group="block0" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-ck"]' required> <b>Ya, Saya setuju</b>
 																					   </label>
                                             <div id="condition-ck" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
                                          </div>
                                      </div>
                                   </div>
                               </div>
                               <div class="col-md-2"></div>

                             </fieldset>

                       <fieldset>
                          <legend>Data Siswa</legend>
                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                  <?php $this->load->view('web/step/2'); ?>
                            </div>
                          </div>
                          <div class="col-lg-12"></div>
                        </fieldset>

                      <fieldset>
                           <legend>Data Ortu / Wali</legend>
                           <div class="row">
                             <div class="col-md-2"></div>
                             <div class="col-md-8">
                  <?php $this->load->view('web/step/3'); ?>
                             </div>
                           </div>
                           <div class="col-lg-12"></div>
                        </fieldset>

                        <fieldset>
                            <legend>Data Nilai Rapor</legend>
                            <div class="row">
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                <?php $this->load->view('web/step/6'); ?>
                              </div>
                            </div>
                        </fieldset>

                        <fieldset>
                           <legend>Konfirmasi</legend>
                           <div class="row">
                           <div class="form-group" >
                               <div class="col-md-3">
                              </div>
                              <div class="col-md-6 panel p-20" style="text-align:center">
                              <i class="fa fa-info-circle faa-flash animated c-blue" style="font-size:97px"></i><br><br>
                              <span style="font-size:15px">
                                 Proses Pendaftaran PPDB Online SMK NU 01 ADIWERNA hampir selesai. Silakan lengkapi data yang masih kosong di dashboard.
                                 <br><br>
                                 <div class="col-md-12" >
                                       <span class="text-primary" style="font-size:18px;"><strong>Apakah data calon siswa sudah sesuai ?</strong></span>
                                       <div class="form-group">
                                          <div class="radio bg-success p-10" style="border-radius:3px;" >
                                             <label>
                                               <input type="radio" value="cekx" name="cekx" data-parsley-group="blockx" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-cx"]' required> <b>Ya, data sudah sesuai</b>
                                             </label>
                                             <div class="faa-flash animated" id="condition-cx" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
                                          </div>
                                   </div>

                              </span>
                              </div>
                              <div class="col-md-3">
                              </div>
                           </div>
                           <div class="col-lg-12"></div>
                        </fieldset>
                      </form>
                    </div>

                </div>
              </div>
            </div>

          </div>
          <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright &copy; <?php echo date('Y'); ?> Sistem Informasi PPDB <a href="#" target="_blank">SMK NU 01 ADIWERNA</a> | Powered By <a href="" target="_blank">Muhammad Zaky Yulianto</a></span>
              </p>
              <p class="pull-right sm-pull-reset">
                <span><a href="" class="m-r-10"><i class="fa fa-home"></i> Beranda </a> | <a href="#" class="m-l-10 m-r-10" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-legal"></i>Ketentuan & Syarat PPDB</a></span>
              </p>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->
      <!-- BEGIN BUILDER -->

      <!-- END BUILDER -->
    </section>
    <!-- BEGIN QUICKVIEW SIDEBAR -->

    <!-- END QUICKVIEW SIDEBAR -->
    <!-- BEGIN SEARCH -->

    <!-- END SEARCH -->
    <!-- BEGIN PRELOADER -->

    <!-- END PRELOADER -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="margin-top:5px;">
    <div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      	<?php $this->load->view('web/step/1'); ?>
      </div>
    </div>
  </div>
</div>

    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>
    <script src="assets/kitkat/assets/plugins/jquery/jquery-1.11.1.min.js"></script>

    <script src="assets/kitkat/assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/kitkat/assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
    <script src="assets/kitkat/assets/plugins/gsap/main-gsap.min.js"></script>
    <script src="assets/kitkat/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/kitkat/assets/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script src="assets/kitkat/assets/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="assets/kitkat/assets/plugins/translate/jqueryTranslator.min.js"></script> <!-- Translate Plugin with JSON data -->
    <script src="assets/kitkat/assets/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
    <script src="assets/kitkat/assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script src="assets/kitkat/assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script src="assets/kitkat/assets/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
    <script src="assets/kitkat/assets/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script src="assets/kitkat/assets/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
    <script src="assets/kitkat/assets/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="assets/kitkat/assets/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
    <script src="assets/kitkat/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script src="assets/kitkat/assets/plugins/charts-chartjs/Chart.min.js"></script>
    <script src="assets/kitkat/assets/plugins/timepicker/jquery-ui-timepicker-addon.min.js"></script>
    <script src="assets/kitkat/assets/plugins/multidatepicker/multidatespicker.min.js"></script>
    <script src="assets/kitkat/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/kitkat/assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="assets/kitkat/assets/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="assets/kitkat/assets/js/application.js"></script> <!-- Main Application Script -->
    <script src="assets/kitkat/assets/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="assets/kitkat/assets/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script src="assets/kitkat/assets/js/quickview.js"></script> <!-- Chat Script -->
    <script src="assets/kitkat/assets/js/pages/search.js"></script> <!-- Search Script -->
    <script src="assets/kitkat/js/cust.js"></script> <!-- Search Script -->
    <!-- BEGIN PAGE SCRIPTS -->
    <script src="assets/kitkat/assets/plugins/step-form-wizard/plugins/parsley/parsley.min.js"></script> <!-- OPTIONAL, IF YOU NEED VALIDATION -->
    <script src="assets/kitkat/assets/plugins/step-form-wizard/js/step-form-wizard.js"></script> <!-- Step Form Validation -->
    <script src="assets/kitkat/assets/js/pages/form_wizard.js"></script>
    <script src="assets/kitkat/assets/input/js/fileinput.js" type="text/javascript"></script>
    <script>

            $("#foto").fileinput({
                allowedFileExtensions : ['jpg'],
                showPreview : false,
                showUpload: false,
                browseClass: "btn btn-primary",
                elErrorContainer: "#errorBlock",
                maxFileSize: 2000,
                removeLabel: "Hapus",
                removeClass: "btn btn-danger",
                removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> "
           });
    </script>

    <script type="text/javascript">
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }
    </script>
    <!-- END PAGE SCRIPTS -->
</body>
</html>
