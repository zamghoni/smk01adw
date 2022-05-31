<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_web; ?></title>
    <base href="<?php echo base_url();?>"/>
  	<link rel="icon" type="image/png" href="assets/panel/images/download.png"/>
    <style>
    table {
        border-collapse: collapse;
    }
    thead > tr{
      background-color: #0070C0;
      color:#f1f1f1;
    }
    thead > tr > th{
      background-color: #0070C0;
      color:#fff;
      padding: 10px;
      border-color: #fff;
    }
    th, td {
      padding: 2px;
    }

    th {
        color: #222;
    }
    body{
      font-family:Calibri;
    }
    </style>
  </head>
  <body onload="window.print();">
    <?php $this->load->view('kop_lap'); ?>
    <h4 align="center" style="margin-top:0px;"><u>BUKTI PENDAFTARAN</u></h4>
    <b><center>
      PANITIA PENERIMAAN SISWA BARU (PSB) <br>
      SMK NU 01 ADIWERNA <br>
      Tahun Pelajaran <?php echo $thn_ppdb; ?> / <?php echo $thn_ppdb+1; ?></center>
    </b>
    <br>
 
    <table width="100%" border="0">
    <tr>
        <td>Tanggal Daftar </td>
        <td>:</td>
        <td><?php echo $this->Model_data->tgl_id(date('d-m-Y', strtotime($user->tgl_siswa))); ?></td>
      </tr>
      <tr>
        <td>Tanggal Cetak </td>
        <td>:</td>
        <td><?php echo $this->Model_data->tgl_id(date('d-m-Y')); ?></td>
      </tr>
      <tr>
        <td width="200">No.Pendaftaran </td>
        <td width="1">:</td>
        <td><?php echo $user->no_pendaftaran; ?></td>
      </tr>
      <tr>
        <td>Pilihan Jurusan </td>
        <td>:</td>
        <td><?php echo ucwords($user->pil_jurusan); ?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_lengkap); ?></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?php echo $user->jk; ?></td>
      </tr>
      <tr>
        <td>TTL</td>
        <td>:</td>
        <td><?php echo $user->tempat_lahir; ?>, <?php echo date('d-m-Y', strtotime($user->tgl_lahir)); ?></td>
      </tr>

      <tr>
        <td width="200">Foto </td>
        <td width="1">:</td>
        <td><img src="<?php echo base_url().'img/siswa/'.$foto->nama_foto ?>" width="130" height="150"></td>
      </tr>

      <tr>
        <td>Alamat Siswa</td>
        <td>:</td>
        <td><?php echo $user->alamat_siswa; ?></td>
      </tr>
      <tr>
        <td>Tanggal Ujian</td>
        <td>:</td>
        <?php $zz = $web->tgl_ujian; ?>
        <td><?php echo date('d-m-Y', strtotime($zz)); ?></td>
      </tr>
    </table>
    <br><br>
<!--=======================================================================-->
    <br>
	<br>
	<br>
	<br>
	<br>
  <?php 

    $kepsek = $this->db->get('tbl_web')->result();
        foreach ($kepsek as $row){

   ?>

    <div style="float:right;">
      Tegal, <?php echo $this->Model_data->tgl_id(date('d-m-Y')); ?> <br><br><br><br>
     <!-- <img src="img/ttd.jpg" alt="" width="100">--> <br>
     _____________________________
     <br>

     <b>(Petugas PSB SMK NU 01 Adiwerna)</b>
    </div>
      <?php } ?>
    </table>

  </body>
</html>
