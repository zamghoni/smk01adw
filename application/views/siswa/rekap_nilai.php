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
    <h4 align="center" style="margin-top:0px;"><u>REKAPITULASI NILAI RAPOR</u></h4>
    <br>

    <table width="100%" border="0">
      <tr>
        <td width="200">NO. PENDAFTARAN</td>
        <td width="1">:</td>
        <td><b><i><?php echo $user->no_pendaftaran; ?></i></b></td>
      </tr>
      <tr>
        <td>TANGGAL PENDAFTARAN </td>
        <td>:</td>
        <td><?php echo $this->Model_data->tgl_id(date('d-m-Y', strtotime($user->tgl_siswa))); ?></td>
      </tr>
      <tr>
        <td>TANGGAL CETAK </td>
        <td>:</td>
        <td><?php echo $this->Model_data->tgl_id(date('d-m-Y')); ?></td>
      </tr>
      <tr>
        <td>NISN</td>
        <td>:</td>
        <td><?php echo $user->nisn; ?></td>
      </tr>
      <tr>
        <td>NAMA LENGKAP</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_lengkap); ?></td>
      </tr>
      <tr>
        <td>JENIS KELAMIN</td>
        <td>:</td>
        <td><?php echo $user->jk; ?></td>
      </tr>
      <tr>
        <td>TEMPAT, TANGGAL LAHIR</td>
        <td>:</td>
        <td><?php echo "$user->tempat_lahir, ".$this->Model_data->tgl_id($user->tgl_lahir); ?></td>
      </tr>
      <tr>
        <td>ASAL SEKOLAH</td>
        <td>:</td>
        <td><?php echo ucwords($user->asal_sekolah); ?></td>
      </tr>
    </table>
    <br>

    <table width="100%" border="1">
      <tr>
        <th rowspan="2">Mata Pelajaran</th>
        <th colspan="5">Nilai Rapor Semester</th>
        <th rowspan="2">Rata - Rata <br>Nilai</th> <!--Rata - Rata <br> Rapor-->
      </tr>
      <tr>
        <th>K4. SEMESTER 1</th>
        <th>K4. SEMESTER 2</th>
        <th>K5. SEMESTER 1</th>
        <th>K5. SEMESTER 2</th>
        <th>K6. SEMESTER 1</th>
      </tr>
      <tr align="center">
        <td align="left">Ilmu Pengetahuan Alam (IPA)</td>
        <?php
          $ipa = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Ilmu Pengetahuan Alam (IPA)"))->row();
        ?>
        <td><?php echo number_format($ipa->semester1,2,",","."); ?></td>
        <td><?php echo number_format($ipa->semester2,2,",","."); ?></td>
        <td><?php echo number_format($ipa->semester3,2,",","."); ?></td>
        <td><?php echo number_format($ipa->semester4,2,",","."); ?></td>
        <td><?php echo number_format($ipa->semester5,2,",","."); ?></td>
        <td><?php echo number_format($ipa->rata_rata_nilai,2,",","."); ?></td>
        
      </tr>
 
      <tr align="center">
        <td align="left">Matematika</td>
        <?php
          $mtk = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Matematika"))->row();
        ?>
        <td><?php echo number_format($mtk->semester1,2,",","."); ?></td>
        <td><?php echo number_format($mtk->semester2,2,",","."); ?></td>
        <td><?php echo number_format($mtk->semester3,2,",","."); ?></td>
        <td><?php echo number_format($mtk->semester4,2,",","."); ?></td>
        <td><?php echo number_format($mtk->semester5,2,",","."); ?></td>
        <td><?php echo number_format($mtk->rata_rata_nilai,2,",","."); ?></td>
        
      </tr>
      <tr align="center">
        <td align="left">Bahasa Indonesia</td>
        <?php
          $ind = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Bahasa Indonesia"))->row();
        ?>
        <td><?php echo number_format($ind->semester1,2,",","."); ?></td>
        <td><?php echo number_format($ind->semester2,2,",","."); ?></td>
        <td><?php echo number_format($ind->semester3,2,",","."); ?></td>
        <td><?php echo number_format($ind->semester4,2,",","."); ?></td>
        <td><?php echo number_format($ind->semester5,2,",","."); ?></td>
        <td><?php echo number_format($ind->rata_rata_nilai,2,",","."); ?></td>
        
      </tr>
      <tr align="center">
        <td align="left">Bahasa Inggris</td>
        <?php
          $ing = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Bahasa Inggris"))->row();
        ?>
        <td><?php echo number_format($ing->semester1,2,",","."); ?></td>
        <td><?php echo number_format($ing->semester2,2,",","."); ?></td>
        <td><?php echo number_format($ing->semester3,2,",","."); ?></td>
        <td><?php echo number_format($ing->semester4,2,",","."); ?></td>
        <td><?php echo number_format($ing->semester5,2,",","."); ?></td>
        <td><?php echo number_format($ing->rata_rata_nilai,2,",","."); ?></td>
       
      </tr>
      
      
      <tr>
        <th colspan="6">Jumlah</th>
        <th><?php echo number_format($nilai_rapor,2,",","."); ?></th>
      </tr>
      <tr>
        <th colspan="6">Rata - Rata Rapor</th>
        <th><?php echo number_format($nilai_rapor / 4,2,",","."); ?></th>
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
      <tr>
        <td valign="top">2.</td>
        <td align="justify">Apabila ditemukan data nilai yang telah saya berikan tidak benar, maka saya bersedia dikenakan sanksi dan atau di diskualifikasi dari seleksi Penerimaan Siswa Baru (PSB) SMK NU 01 Adiwerna Tahun Pelajaran <?php echo $thn_ppdb; ?>/<?php echo $thn_ppdb+1; ?>.</td>
      </tr>
    </table>

  </body>
</html>
