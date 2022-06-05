<?php
  $cek    = $user->row();
  $id_user = $cek->id_siswa;
  $nama    = $cek->nama_lengkap;

  $tgl = date('m-Y');
?>

<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
    <?php if ($cek->status_pendaftaran == 'Lulus') {?>
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="glyphicon glyphicon-bullhorn"></i> Pengumuman
          </h3>
        </div>
        <div class="panel-body">
          <h3>
            <center>
              Selamat <b><?php echo $nama; ?></b>, Anda dinyatakan <span class="label label-success" style="font-size:20px;">Lulus</span> Seleksi Sebagai Calon Siswa Baru <b>SMK NU 01 Adiwerna</b>, Silahkan Cetak Surat Pengumuman Sebagai Bukti Lulus Seleksi.
              <hr>
              <a href="panel_siswa/cetak_lulus" class="btn btn-success btn-lg" target="_blank"><i class="icon-printer4"></i> Cetak Bukti Lulus</a>
              <a href="panel_siswa/cetak_nilai" class="btn btn-success btn-lg" target="_blank"><i class="icon-printer4"></i> Cetak Nilai</a>
            </center>
          </h3>
        </div>
      </div>
    <?php }elseif ($cek->status_pendaftaran == 'Tidak-lulus') { ?>
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="glyphicon glyphicon-bullhorn"></i> Pengumuman
          </h3>
        </div>
        <div class="panel-body" style="color:red">
          <h3>
            <center>
              Mohon Maaf <b><?php echo $nama; ?></b>
               <span class="label label-danger" style="font-size:20px;">Tidak Lulus</span> <br>
              Sebagai Calon Siswa Baru <b>SMK NU 01 Adiwerna</b>.
            </center>
            <br>
          </h3>
        </div>
      </div>
    <?php }else{ ?>
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="glyphicon glyphicon-bullhorn"></i> Pengumuman
          </h3>
        </div>
        <div class="panel-body">
          <h3>
            A. Tes Wawancara pada tanggal :  Pukul 08.00 - 15.00 Di SMK NU 01 Adiwerna <br> <br>
            B. Tes CBT klik pada link berikut
            <form action="<?= base_url('cbt/adm/act_login_sso') ?>" method="POST">
              <input type="hidden" name="username" value="<?= $this->session->userdata('no_pendaftaran')  ?>">
              <input type="hidden" name="password" value="<?= $this->session->userdata('nisn') ?>">
              <button type="submit" class="btn btn-primary" style="color: white;">
                <span>Masuk Ruang Ujian</span></button>
            </form>
            <!-- <center>~ Belum ada Pengumuman dari Panitia PSB Online SMK NU 01 Adiwerna ~</center> -->
          </h3>
          <p>Informasi PPDB Hub. 08157775454 / Whatsapp Kami :
            <a href="https://wa.me/628157775454" target="_blank">Klik Disini</a>
          </p>
        </div>
      </div>
    <?php } ?>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
