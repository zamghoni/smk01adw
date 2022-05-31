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
    <h4 align="center" style="margin-top:0px;"><u>HASIL UJIAN SELEKSI PSB</u></h4>

    <table width="100%" border="0">
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
        <td width="200">No.Pendaftaran </td>
        <td width="1">:</td>
        <td><b><i><?php echo $user->no_pendaftaran; ?></i></b></td>
      </tr>
      <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td><?php echo $user->nama_lengkap; ?></td>
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
        <td>Agama </td>
        <td>:</td>
        <td><?php echo $user->agama; ?></td>
      </tr>
      </tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $user->alamat_siswa; ?></td>
      </tr>
      <tr>
      <td>Asal Sekolah</td>
      <td>:</td>
      <td><?php echo ucwords($user->asal_sekolah); ?></td>
      </tr>
     

      
    </table>
    <br>

<!--======Tambahan ===========-->

     <table width="100%"  border="2">

            <tr>
            <!--  <th width="30px;">No.</th> -->
              <th width="200px">No. Pendaftaran</th>
              <th width="150px">No. Test</th>
              <th>Tgl Ujian</th>
              <th>Nama Lengkap</th>
              <th>Ruang Ujian</th>
              <th>Nilai Ujian</th>
              
              
            </tr>
                  <tr align="center">
                      <td><?php echo $ujian->no_pendaftaran; ?></td>
                      <td><?php echo $ujian->no_test; ?></td>
                      <td><?php echo $ujian->tanggal; ?></td>
                      <td><?php echo ucwords($ujian->nama); ?></td>
                      <td>Ruang <?php echo $ujian->ruang_ujian; ?></td>
                      <td><?php echo $ujian->nilai_pai; ?></td>
                    </tr>

          </table>

<!--===========-->
<!--    <br>
    <center>
    <table width="90%" border="1">
      <tr align="center">
        <th>Kategori Penilaian</th>
        <th width="100">Nilai</th>
      </tr>
      <tr>
        <td>Nilai Bakat</td>
        <td align="center"><?php echo $bakat->nilai_bakat; ?></td>
      </tr>
      <tr>
        <td>Nilai Rata Rata Raport Sem.4,5,6</td>
        <td align="center"><?php echo $rapor->rata_rata_nilai; ?></td>
      </tr>
      <tr>
        <td>Nilai Ujian Nasional</td>
        <td align="center"><?php echo $user->jml_nilai_un; ?></td>
      </tr>
      <tr>
        <td>Nilai Ujian Seleksi</td>
        <td align="center"><?php echo $ujian->nilai_pai; ?></td>
      </tr>
      <?php 
      $jumlah = $bakat->nilai_bakat + $rapor->rata_rata_nilai + $user->jml_nilai_un + $ujian->nilai_pai; 
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
    </center>
    <br>

    <div style="float:right;margin-right:100px;">
      <table>
        <tr>
          <td>
            <div style="border:1px solid black;width:120px;margin-right:10px;text-align:center;font-weight:bold">
              <br><br>
              Pas Foto <br><br>
              3 x 4
              <br><br><br>
            </div>
          </td>
          <td>
            Tegal,...................<?php echo $thn_ppdb; ?><br>
      			Verifikator,  <br>
            <br><br><br><br>
            (Petugas PSB MTs Negeri Kota Tegal)
          </td>
        </tr>
      </table>
    </div>
-->


 <!--   Perlengkapan TPA :  <br>
    <ol style="margin-top:0px;">
      <li>Membawa bukti hasil verifikasi</li>
      <li>Kartu Ujian CBT</li>
    </ol> -->

    <br>


  </body>
</html>
