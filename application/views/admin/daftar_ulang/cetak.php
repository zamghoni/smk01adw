<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_web; ?></title>
    <base href="<?php echo base_url();?>"/>
  	<link rel="icon" type="image/png" href="img/logo_mts.png"/>
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
    <h4 align="center" style="margin-top:0px;"><u>KWITANSI DAFTAR ULANG</u></h4>

    <table width="100%" border="0">
      <tr>
        <td width="200"><b>Telah Menerima Uang Dari</b></td>
        <td width="1">:</td>
        <td></td>
      </tr>
      <tr>
        <td>No.Pendaftaran </td>
        <td>:</td>
        <td><?php echo $user->no_pendaftaran; ?></td>
      </tr>
      <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_lengkap); ?></td>
      </tr>
      <tr>
        <td>Asal Sekolah</td>
        <td>:</td>
        <td><?php echo ucwords($user->asal_sekolah); ?></td>
      </tr>
    </table>
      <table>
        <tr>
        <td width="500"><b>Guna Membayar biaya Daftar Ulang sebesar : </b></td>
      </tr>
    </table>
    <table border="1">
      <tr>
        <td> <b><?php echo $besaran->nominal; ?></b> </td>
      </tr>
      </table>
      

    <div style="float:right;margin-right:100px;">
      <table>
        <tr>
          <td>
          </td>
          <td>
            Tegal, <?php echo $this->Model_data->tgl_id(date('d-m-Y')); ?>
            <br>
            Panitia Pendaftaran
            <br><br><br><br><br>
            _____________________________
            <br>
            NIP.
          </td>
        </tr>
      </table>
    </div>

    <div style="float:left;margin-left:20px;">
      <table>
        <tr>
          <td>
          </td>
          <td><br>
            Peserta Daftar Ulang
            <br><br><br><br><br>
            _____________________________
            <br>
                         Nama Lengkap
          </td>
        </tr>
      </table>
    </div>


  </body>
</html>
