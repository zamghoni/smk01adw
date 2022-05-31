<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_web; ?></title>
    <base href="<?php echo base_url();?>"/>
  	<link rel="icon" type="image/png" href="assets/panel/images/logo_mts.png"/>
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
    <h4 align="center" style="margin-top:0px;"><u>REKAPITULASI NILAI AKHIR SELEKSI</u></h4>
    <br>

    <table width="100%" border="0">
      <tr>
        <td width="200">No. Pendaftaran</td>
        <td width="1">:</td>
        <td><b><i><?php echo $user->no_pendaftaran; ?></i></b></td>
      </tr>
      <tr>
        <td>Tanggal Pendaftaran </td>
        <td>:</td>
        <td><?php echo $this->Model_data->tgl_id(date('d-m-Y', strtotime($user->tgl_siswa))); ?></td>
      </tr>
      <tr>
        <td>Tanggal Cetak </td>
        <td>:</td>
        <td><?php echo $this->Model_data->tgl_id(date('d-m-Y')); ?></td>
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
        <td>Tempat, Tanggal Lahir </td>
        <td>:</td>
        <td><?php echo "$user->tempat_lahir, ".$this->Model_data->tgl_id($user->tgl_lahir); ?></td>
      </tr>
      <tr>
        <td>Asal Sekolah</td>
        <td>:</td>
        <td><?php echo ucwords($user->asal_sekolah); ?></td>
      </tr>
      <tr>
        <td>Ruang Ujian</td>
        <td>:</td>
        <td>Ruang <?php echo $pai->ruang_ujian;?></td>
      </tr>
    </table>
    <br>

    <table width="100%" border="1">
      <tr>
        <th>Kategori Nilai</th>
        <th>Nilai</th>
      </tr>
      <tr>
        <td>Nilai Bakat</td>
        <td align="center"><?php echo $nilai->nilai_bakat; ?></td>
      </tr>
      <tr>
        <td>Nilai Rata Rata Raport Sem.4,5,6</td>
        <td align="center"><?php echo $nilai->nilai_rapot; ?></td>
      </tr>
      <tr>
        <td>Nilai Ujian Nasional</td>
        <td align="center"><?php echo $nilai->nilai_un; ?></td>
      </tr>
      <tr>
        <td>Nilai Ujian Seleksi</td>
        <td align="center"><?php echo $nilai->nilai_seleksi; ?></td>
      </tr>
      <?php 
      $jumlah = $nilai->nilai_bakat + $nilai->nilai_rapot + $nilai->nilai_un + $nilai->nilai_seleksi;
      $rata = $jumlah/4;
       ?>
    
      <tr>
        <th>Jumlah</th>
        <th><?php echo $jumlah; ?></th>
      </tr>
      <tr>
        <th>Rata - Rata</th>
        <th><?php echo $rata; ?></th>
      </tr>
    </table>
    <br><br>

    <div style="float:right;margin-right:100px;">
      Tegal,...................<?php echo $thn_ppdb; ?><br>
			Orang Tua / Wali  <br>
      <br><br><br>
      .............................................
    </div>
    <br><br><br><br><br><br><br><br>

    <table width="100%" border="0" style="margin-left:5px;">
      <tr>
        <td valign="top" width="1">1.</td>
        <td>Semua data nilai yang di masukan adalah benar dan sesuai dengan nilai asli.</td>
      </tr>
    </table>

  </body>
</html>
