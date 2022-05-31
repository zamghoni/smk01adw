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
    <h4 align="center" style="margin-top:0px;"><u>HASIL VERIFIKASI PENDAFTARAN PSB <?php echo $thn_ppdb; ?></u></h4>

    <table width="100%" border="0">
      <tr>
        <td width="200">No.Pendaftaran </td>
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
        <td>NISN </td>
        <td>:</td>
        <td><?php echo $user->nisn; ?></td>
      </tr>
      <tr>
        <td>Nama Lengkap</td>
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
        <td>Agama </td>
        <td>:</td>
        <td><?php echo $user->agama; ?></td>
      </tr>
      <tr>
        <td>Nama Orangtua / Wali </td>
        <td></td>
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
      <!--<tr>
        <td>RATA - RATA NILAI USBN</td>
        <td>:</td>
        <td><?php echo number_format($nilai_usbn,2,",","."); ?></td>
      </tr>
      <tr>
        <td>RATA - RATA NILAI UNBK/UNKP</td>
        <td>:</td>
        <td><?php echo number_format($nilai_unbk,2,",","."); ?></td>
      </tr>-->
    </table>
        <!--====================tambahan=======================-->
<table width="80%" border="0">
      <tr>
        <td width="200">Nomor Ijazah</td>
        <td width="1">:</td>
        <td><?php echo $user->nomor_ijazah; ?></td>
      </tr>
      <tr>
        <td>Asal Sekolah</td>
        <td>:</td>
        <td><?php echo ucwords($user->asal_sekolah); ?></td>
      </tr>
      <tr>
        <td>Alamat Sekolah</td>
        <td>:</td>
        <td><?php echo $user->alamat_sekolah; ?></td>
      </tr>
      <tr>
        <td>Tahun Lulus</td>
        <td>:</td>
        <td><?php echo $user->tahun_lulus; ?></td>
      </tr>
      <tr>
        <td style="padding-left:55px;">Nilai Matematika</td>
        <td>:</td>
        <td><?php echo $user->matematika; ?></td>
      </tr>
      <tr>
        <td style="padding-left:55px;">Nilai Bahasa Indonesia</td>
        <td>:</td>
        <td><?php echo $user->bahasa_indonesia; ?></td>
      </tr>
      <tr>
        <td style="padding-left:55px;">Nilai I.P.A</td>
        <td>:</td>
        <td><?php echo $user->ipa; ?></td>
        </tr>
      <tr>
        <td style="padding-left:55px;">Jumlah Nilai UN</td>
        <td >:</td>
        <td><?php echo $user->jml_nilai_un;?></td>
      </tr>
  </table> 

<!--=================tambahan bakat=========================-->
  <table width="80%" border="0"> 
      <tr>
        <td width="200">Nama Bakat </td>
        <td width="1">:</td>
        <td><?php echo $bakat->nama_prestasi; ?></td>
      </tr>

      <tr>
        <td style="padding-left:55px;">Juara Ke- </td>
        <td>:</td>
        <td><?php echo $bakat->juara_ke; ?></td>
        </tr>
        <tr>
            <td style="padding-left:55px;">Tingkat</td>
            <td>:</td>
            <td><?php echo $bakat->tingkat; ?></td>
        </tr>
        <tr>
            <td style="padding-left:55px;">Tahun</td>
            <td>:</td>
            <td><?php echo $bakat->tahun_prestasi; ?></td>
            </tr>
        <tr>
      <tr>
        <td style="padding-left:55px;">Nilai Bakat</td>
        <td>:</td>
        <td><?php echo $bakat->nilai_bakat; ?></td>
      </tr>
</table> <br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


    <table width="100%" border="1">
      <tr>
        <th rowspan="2">Mata Pelajaran</th>
        <th colspan="5">Nilai Rapor Semester</th>
        <th rowspan="2">Rata - Rata<br>Nilai</th> <!--<br> rapor-->
      </tr>
      <tr>
        <th>K4.Semester1</th>
        <th>K4.Semester2</th>
        <th>K5.Semester1</th>
        <th>K5.Semester2</th>
        <th>K6.Semester1</th>
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
        <th colspan="6">Rata - Rata Rapor</th> <!--Rata - Rata-->
        <th><?php echo number_format($nilai_rapor / 4,2,",","."); ?></th>
      </tr>
    </table>
    <br><br>
<!--=======================================================================-->
    
<br>


    <center>
    <table width="90%" border="1">
      <tr align="center">
        <th>Materi dan Jadwal Ujian</th>
        <th width="100">Ket.</th>
      </tr>
      <tr>
        <td style="padding-left:10px;"><?php echo $v_materi->isi; ?></td>
        <td></td>
      </tr>
    </table>
    </center>
    <br>

    <div style="float:right;margin-right:100px;">
      <table>
        <tr>
          <td>
            <div style="border:1px solid black;width:133px;margin-right:153px;text-align:center;font-weight:bold">
              <img src="<?php echo base_url().'img/siswa/'.$foto->nama_foto ?>" width="130" height="150">
            </div>
          </td>
          <td>
            Tegal,...........................<?php echo $thn_ppdb; ?><br>
            Verifikator, 
            <br><br><br><br><br><br><br><br>
            _____________________________
            <br>
            <b>Hatin Azizah S.pd </b>
            <br>
            <b> NIP: NIP.197105042005012011 </b>
            <br>
            (Petugas PSB SMK NU 01 Adiwerna)
          </td>
        </tr>
      </table>
    </div>

  </body>
</html>
