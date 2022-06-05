<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_web; ?></title>
    <base href="<?php echo base_url();?>"/>
  	<link rel="icon" type="image/png" href="assets/panel/images/download.png">
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
    <br>
    <h4 align="center" style="margin:0px;font-size:19px;"><u><b>S U R A T  P E N G U M U M A N</b></u></h4>

    <br>
    <table width="100%" border="0">
      <tr>
        <td colspan="3">Kepala SMK NU 01 Adiwerna dengan ini menyatakan bahwa :</td>
      </tr>
      <tr>
        <td width="200">No. Pendaftaran </td>
        <td width="1">:</td>
        <td><?php echo $user->no_pendaftaran; ?></td>
      </tr>
      <tr>
        <td>Tanggal Pendaftaran </td>
        <td>:</td>
        <td><?php echo date('d-m-Y', strtotime($user->tgl_siswa)); ?></td>
      </tr>
      <tr>
        <td>Tanggal Cetak </td>
        <td>:</td>
        <td><?php echo date('d-m-Y'); ?></td>
      </tr>
      <tr>
        <td>NISN </td>
        <td>:</td>
        <td><?php echo $user->nisn; ?></td>
      </tr>
      <tr>
        <td>Nama </td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_lengkap); ?></td>
      </tr>
      <tr>
        <td>Jenis Kelamin </td>
        <td>:</td>
        <td><?php echo $user->jk; ?></td>
      </tr>
      <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td>:</td>
        <td><?php echo "$user->tempat_lahir, ".$this->Model_data->tgl_id($user->tgl_lahir); ?></td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo $user->agama; ?></td>
      </tr>
      <tr>
        <td>Nama Orangtua/Wali</td>
        <td>:</td>
        <td></td>
      </tr>
      <tr>
        <td style="padding-left:55px;">Ayah</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_ayah); ?></td>
      </tr>
      <tr>
        <td style="padding-left:55px;">Ibu</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_ibu); ?></td>
      </tr>
      <tr>
        <td style="padding-left:55px;">Wali</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_wali); ?></td>
      </tr>
      <tr>
        <td>Asal Sekolah</td>
        <td>:</td>
        <td><?php echo ucwords($user->asal_sekolah); ?></td>
      </tr>
    </table>
    <br>

    <center>
      <div style="border:1px solid black; color:red;width:50%;padding:10px;">
        <b style="font-size:20px;"><u>L U L U S</u></b>
      </div>
    </center>
    <br>

    Seleksi Sebagai Calon Siswa Baru SMK NU 01 Adiwerna tahun ajaran <?php echo $thn_ppdb; ?>/<?php echo $thn_ppdb+1; ?>.<br>
    Demikian pengumuman ini disampaikan untuk dapat digunakan sebagai mestinya.
    <br><br>

    <div style="float:right;">
      Tegal, <?php echo date('d-m-Y'); ?> <br>
			Kepala Sekolah,  <br>
      <br>
	  <br>
	  <br>
	  <br>
    <?php

    $kepsek = $this->db->get('tbl_web')->result();
        foreach ($kepsek as $row){

     ?>
      <!--<center>dto</center>-->
      <center><b><u><?php echo $row->kepala_sekolah; ?></u></b><br></center>
    </div>
    <br><br><br><br><br><br>
<br><?php } ?>
    <?php echo $v_ket->ket_pengumuman; ?>

  </body>
</html>
