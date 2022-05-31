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
    <h2 align="center" style="margin-top:0px;"><u>Cetak Data Nilai</u></h2>
    <br>
 <!--   <h4>Total Siswa Lulus : <?php
                    echo number_format($this->db->get_where('tbl_nilai', "keterangan='lulus'")->num_rows(),0,",",".");  ?></h4> -->

    <table width="100%" border="2">
      <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Nama Lengkap</th>
              <th>No. Pendaftaran</th>
              <th>Total Nilai</th>
              <th>Rata Rata Nilai</th>
              <th>Registered</th>
            </tr>
          </thead>
          <tbody align="center">
              <?php
              $no = 1;
              $peringkat = 1;
              foreach ($v_siswa->result() as $baris) {?>
                <tr>
                   <?php 
                    $jumlah = $baris->nilai_bakat + $baris->nilai_rapot + $baris->nilai_un + $baris->nilai_seleksi; 
              $rata = $jumlah/4;
                   ?>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $baris->nama; ?></td>
                  <td><?php echo $baris->no_pendaftaran; ?></td>
                  <td><?php echo $jumlah; ?></td>
                  <td><?php echo $rata; ?></td>
                  <td><?php echo $baris->registered; ?></td>
                </tr>
              <?php
              } ?>
          </tbody>
    </table>
    <br>
    <br>
    <br><br><br><br>
    <div style="float:right;margin-right:100px;">
      <table>
        <tr>
          <td>
            Tegal,.............................<?php echo $thn_ppdb; ?><br>
            <br><br><br><br>
            ..................................................
            <br>
            Hatin Azizah S.Pd
            <br>
            <b> NIP: NIP.197105042005012011 </b>
            <br>
            (Petugas PSB MTs Negeri Kota Tegal)
          </td>
        </tr>
      </table>
    </div>  

    <br>


  </body>
</html>
