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
        <td>Nilai Rata-Rata UN (25%)</td>
        <td align="center"><?php echo $un->rata_rata; ?></td>
      </tr>
      <tr>
        <td>Nilai Tes Wawancara (20%)</td>
        <td align="center"><?php echo $pai->nilai_pai; ?></td>
      </tr>
        <td>Nilai Ujian Seleksi CBT (30%)</td>
        <td align="center"><?php echo $cbt->nilai; ?></td>
      </tr>
      <tr>
        <td>Nilai Rata-Rata Raport (25%)</td>
        <td align="center"><?php echo $nilai->nilai_rapot; ?></td>
        <tr>
      <?php
      $jumlah = ($un->rata_rata*(25/100)) + ($pai->nilai_pai*(20/100)) + ($cbt->nilai*(30/100)) + ($nilai->nilai_rapot*(25/100));
      $rata2 = $un->rata_rata + $pai->nilai_pai + $cbt->nilai + $nilai->nilai_rapot;
      $rata = $rata2/4;
       ?>

      <tr>
        <th>Nilai Akhir (100%)</th>
        <th><?php echo round($jumlah,2); ?></th>
      </tr>
      <tr>
        <th>Rata - Rata Nilai</th>
        <th><?php echo round($rata,2); ?></th>
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
