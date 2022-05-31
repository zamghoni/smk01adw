<style>
  #tbl_input{width:50px;text-align: center;}
  #tbl_input2{width:100px;text-align: center;}
  #th_center > th {text-align: center;}
</style>

<?php
error_reporting(0);
$user = $user->row();
$bakat = $bakat->row();
$ujian = $ujian->row();
$foto = $foto->row();
$web = $web->row();
?>
<!-- Main content -->
<div class="content-wrapper">

  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-3">
      <div class="panel panel-flat">
          <div class="panel-body">
              <center>
                <img src="<?php echo base_url().'img/siswa/'.$foto->nama_foto ?>" width="126">
              </center>
            <br>
            <fieldset class="content-group">
              <hr style="margin-top:0px;">
              <i class="icon-calendar"></i> <b>Tanggal Daftar</b> :
              <?php echo $this->Model_data->tgl_id(date('d-m-Y H:i:s', strtotime($user->tgl_siswa))); ?>
              <hr>
            </fieldset>
           <?php echo form_open_multipart('panel_siswa/update_photo') ?>
              <div>
                <label><b>Update Photo</b></label>
                <input class="form-control" type="file" name="foto">
              </div>
              <br>
              <input type="hidden" name="id" value="<?php echo $user->id_siswa; ?>">
              <input type="hidden" name="no_pendaftaran" value="<?php echo $user->no_pendaftaran; ?>">
              <button type="submit" name="save" class="btn btn-warning">Update</button>
            <?php echo form_close() ?>
          </div>
      </div>
      </div>

      <div class="col-md-9">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Biodata Siswa</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                      <th width="20%">NO. PENDAFTARAN</th>
                      <th width="1%">:</th>
                      <td><?php echo $user->no_pendaftaran; ?></td>
                    </tr>
                    <tr>
                      <th>Pilihan Jurusan</th>
                      <th>:</th>
                      <td><?php echo $user->pil_jurusan; ?></td>
                    </tr>
                    <tr>
                      <th>N.I.S.N</th>
                      <th>:</th>
                      <td><?php echo $user->nisn; ?></td>
                    </tr>
                    <tr>
                      <th>Nama Lengkap</th>
                      <th>:</th>
                      <td><?php echo ucwords($user->nama_lengkap); ?></td>
                    </tr>
                    <tr>
                      <th>Jenis Kelamin</th>
                      <th>:</th>
                      <td><?php echo $user->jk; ?></td>
                    </tr>
                    <tr>
                      <th>Tempat, Tgl Lahir</th>
                      <th>:</th>
                      <td><?php echo "$user->tempat_lahir, ". $this->Model_data->tgl_id($user->tgl_lahir); ?></td>
                    </tr>
                    <tr>
                      <th>Agama</th>
                      <th>:</th>
                      <td><?php echo $user->agama; ?></td>
                    </tr>
                    <tr>
                      <th>Anak Ke-</th>
                      <th>:</th>
                      <td><?php echo $user->anak_ke; ?></td>
                    </tr>
                    <tr>
                      <th>Jumlah Saudara Kandung</th>
                      <th>:</th>
                      <td><?php echo $user->jml_saudara_kandung; ?></td>
                    </tr>
                    <tr>
                      <th>Jumlah Saudara Tiri</th>
                      <th>:</th>
                      <td><?php echo $user->jml_saudara_tiri; ?></td>
                    </tr>
                    <tr>
                      <th>Alamat</th>
                      <th>:</th>
                      <td><?php echo $user->alamat_siswa; ?></td>
                    </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
      </div>

      <div class="col-md-4">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Data Ayah</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                      <th width="20%">Nama Lengkap</th>
                      <th width="1%">:</th>
                      <td><?php echo ucwords($user->nama_ayah); ?></td>
                    </tr>
                    <tr>
                      <th>Pendidikan</th>
                      <th>:</th>
                      <td><?php echo $user->pdd_ayah; ?></td>
                    </tr>
                    <tr>
                      <th>Pekerjaan</th>
                      <th>:</th>
                      <td><?php echo $user->pekerjaan_ayah; ?></td>
                    </tr>
                    <tr>
                      <th>Penghasilan</th>
                      <th>:</th>
                      <td><?php echo $user->penghasilan_ayah; ?></td>
                    </tr>
                    <tr>
                      <th>No. Handphone</th>
                      <th>:</th>
                      <td><?php echo $user->no_hp_ayah; ?></td>
                    </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
      </div>

      <div class="col-md-4">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Data Ibu</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                      <th width="20%">Nama Lengkap</th>
                      <th width="1%">:</th>
                      <td><?php echo ucwords($user->nama_ibu); ?></td>
                    </tr>
                    <tr>
                      <th>Pendidikan</th>
                      <th>:</th>
                      <td><?php echo $user->pdd_ibu; ?></td>
                    </tr>
                    <tr>
                      <th>Pekerjaan</th>
                      <th>:</th>
                      <td><?php echo $user->pekerjaan_ibu; ?></td>
                    </tr>
                    <tr>
                      <th>Penghasilan</th>
                      <th>:</th>
                      <td><?php echo $user->penghasilan_ibu; ?></td>
                    </tr>
                    <tr>
                      <th>No. Handphone</th>
                      <th>:</th>
                      <td><?php echo $user->no_hp_ibu; ?></td>
                    </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
      </div>

      <div class="col-md-4">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Data Wali</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                      <th width="20%">Nama Lengkap</th>
                      <th width="1%">:</th>
                      <td><?php echo ucwords($user->nama_wali); ?></td>
                    </tr>
                    <tr>
                      <th>Pendidikan</th>
                      <th>:</th>
                      <td><?php echo $user->pdd_wali; ?></td>
                    </tr>
                    <tr>
                      <th>Pekerjaan</th>
                      <th>:</th>
                      <td><?php echo $user->pekerjaan_wali; ?></td>
                    </tr>
                    <tr>
                      <th>Penghasilan</th>
                      <th>:</th>
                      <td><?php echo $user->penghasilan_wali; ?></td>
                    </tr>
                    <tr>
                      <th>No. Handphone</th>
                      <th>:</th>
                      <td><?php echo $user->no_hp_wali; ?></td>
                    </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
      </div>


      <div class="col-md-6">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-library2"></i> Data Sekolah $ Ijazah</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                      <th width="30%">Nomor Ijazah</th>
                      <th width="1%">:</th>
                      <td><?php echo $user->nomor_ijazah; ?></td>
                    </tr>
                    <tr>
                      <th>Asal Sekolah</th>
                      <th>:</th>
                      <td><?php echo ucwords($user->asal_sekolah); ?></td>
                    </tr>
                    <tr>
                      <th>Alamat Sekolah</th>
                      <th>:</th>
                      <td><?php echo $user->alamat_sekolah; ?></td>
                    </tr>
                    <tr>
                      <th>Tahun Lulus</th>
                      <th>:</th>
                      <td><?php echo $user->tahun_lulus; ?></td>
                    </tr>
                    <tr>
                      <th>Nilai Matematika</th>
                      <th>:</th>
                      <td><?php echo $user->matematika; ?></td>
                    </tr>
                    <tr>
                      <th>Nilai Bahasa Indonesia</th>
                      <th>:</th>
                      <td><?php echo $user->bahasa_indonesia; ?></td>
                    </tr>
                    <tr>
                      <th>Nilai I.P.A</th>
                      <th>:</th>
                      <td><?php echo $user->ipa; ?></td>
                    </tr>
                    <tr>
                      <th>Jumlah Nilai UN</th>
                      <th>:</th>
                      <td><?php echo $user->jml_nilai_un; ?></td>
                    </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
      </div>

      <div class="col-md-6">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-profile"></i> Nilai Rapor</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" border="1">
                  <tr id="th_center">
                    <th rowspan="2">Mata Pelajaran</th>
                    <th colspan="5" width="25">Semester</th>
                    <th rowspan="2">Rata-Rata Nilai</th>
                  </tr>
                  <tr id="th_center">
                    <th width="5">1</th>
                    <th width="5">2</th>
                    <th width="5">3</th>
                    <th width="5">4</th>
                    <th width="5">5</th>
                  </tr>
                  <tr>
                    <td>Ilmu Pengetahuan Alam (IPA)</td>
                    <?php
                      $ipa = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Ilmu Pengetahuan Alam (IPA)"))->row();
                    ?>
                    <td><?php echo number_format($ipa->semester1,2,",","."); ?></td>
                    <td><?php echo number_format($ipa->semester2,2,",","."); ?></td>
                    <td><?php echo number_format($ipa->semester3,2,",","."); ?></td>
                    <td><?php echo number_format($ipa->semester4,2,",","."); ?></td>
                    <td><?php echo number_format($ipa->semester5,2,",","."); ?></td>
                    <th><?php echo number_format($ipa->rata_rata_nilai,2,",","."); ?></th>
                  </tr>
                  <!--<tr>
                    <td>Ilmu Pengetahuan Sosial (IPS)</td>
                    <?php
                      $ips = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Ilmu Pengetahuan Sosial (IPS)"))->row();
                    ?>
                    <td><?php echo number_format($ips->semester1,2,",","."); ?></td>
                    <td><?php echo number_format($ips->semester2,2,",","."); ?></td>
                    <td><?php echo number_format($ips->semester3,2,",","."); ?></td>
                    <td><?php echo number_format($ips->semester4,2,",","."); ?></td>
                    <td><?php echo number_format($ips->semester5,2,",","."); ?></td>
                    <th><?php echo number_format($ips->rata_rata_nilai,2,",","."); ?></th>
                  </tr>-->
                  <tr>
                    <td>Matematika </td>
                    <?php
                      $mtk = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Matematika"))->row();
                    ?>
                    <td><?php echo number_format($mtk->semester1,2,",","."); ?></td>
                    <td><?php echo number_format($mtk->semester2,2,",","."); ?></td>
                    <td><?php echo number_format($mtk->semester3,2,",","."); ?></td>
                    <td><?php echo number_format($mtk->semester4,2,",","."); ?></td>
                    <td><?php echo number_format($mtk->semester5,2,",","."); ?></td>
                    <th><?php echo number_format($mtk->rata_rata_nilai,2,",","."); ?></th>
                  </tr>
                  <tr>
                    <td>Bahasa Indonesia </td>
                    <?php
                      $ind = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Bahasa Indonesia"))->row();
                    ?>
                    <td><?php echo number_format($ind->semester1,2,",","."); ?></td>
                    <td><?php echo number_format($ind->semester2,2,",","."); ?></td>
                    <td><?php echo number_format($ind->semester3,2,",","."); ?></td>
                    <td><?php echo number_format($ind->semester4,2,",","."); ?></td>
                    <td><?php echo number_format($ind->semester5,2,",","."); ?></td>
                    <th><?php echo number_format($ind->rata_rata_nilai,2,",","."); ?></th>
                  </tr>
                  <tr>
                    <td>Bahasa Inggris </td>
                    <?php
                      $ing = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Bahasa Inggris"))->row();
                    ?>
                    <td><?php echo number_format($ing->semester1,2,",","."); ?></td>
                    <td><?php echo number_format($ing->semester2,2,",","."); ?></td>
                    <td><?php echo number_format($ing->semester3,2,",","."); ?></td>
                    <td><?php echo number_format($ing->semester4,2,",","."); ?></td>
                    <td><?php echo number_format($ing->semester5,2,",","."); ?></td>
                    <th><?php echo number_format($ing->rata_rata_nilai,2,",","."); ?></th>
                  </tr>
                  <tr id="th_center">
                    <th colspan="6">Rata-Rata Rapor</th>
                    <th><?php echo number_format(($ipa->rata_rata_nilai+$mtk->rata_rata_nilai+$ind->rata_rata_nilai+$ing->rata_rata_nilai)/4,2,",","."); ?></th>
                  </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
    </div>
</div>

      <div class="col-md-6">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-profile"></i> Data Minat Bakat / Prestasi</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" border="1">
                  <tr>
                      <th width="30%">Nama Bakat </th>
                      <th width="1%">:</th>
                      <td><?php echo $bakat->nama_prestasi; ?></td>
                    </tr>
                    <tr>
                      <th>Juara Ke- </th>
                      <th>:</th>
                      <td><?php echo $bakat->juara_ke; ?></td>
                    </tr>
                    <tr>
                      <th>Tingkat</th>
                      <th>:</th>
                      <td><?php echo $bakat->tingkat; ?></td>
                    </tr>
                    <tr>
                      <th>Tahun</th>
                      <th>:</th>
                      <td><?php echo $bakat->tahun_prestasi; ?></td>
                    </tr>
                    <tr>
                      <th>Nilai Bakat</th>
                      <th>:</th>
                      <td><?php echo $bakat->nilai_bakat; ?></td>
                    </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
      </div>
    <?php 
/*  
      $r1 = array(
        '001-PSB-2019',
        '002-PSB-2019',
        '003-PSB-2019',
        '004-PSB-2019'
      );

      $r2 = array(
        '037-PSB-2019',
        '038-PSB-2019',
        '039-PSB-2019',
        '040-PSB-2019'
      );

      $r3 = array(
        '041-PSB-2019',
        '042-PSB-2019',
        '043-PSB-2019',
        '044-PSB-2019',
        '108-PSB-2019'
      );

      if($no_pendaftaran < $r1){
        $ruang_ujian = 'Ruang 1';
      }else if($no_pendaftaran < $r2){
        $ruang_ujian = 'Ruang 2';
      }else if($no_pendaftaran < $r3){
        $ruang_ujian = 'Ruang 3';
      }else{
        $ruang_ujian = 'Belum dapat ruangan';
      }

*/
       ?>

      <div class="col-md-6">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-profile"></i> Data Ujian Seleksi</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" border="1">
                  <tr>
                      <th width="30%">No Test </th>
                      <th width="1%">:</th>
                      <td><?php echo $ujian->no_test; ?></td>
                    </tr>
                    <tr>
                      <th>Nilai Ujian Seleksi </th>
                      <th>:</th>
                      <td><?php echo $ujian->nilai_pai; ?></td>
                    </tr>
                    <tr>
                      <th>Tanggal Ujian </th>
                      <th>:</th>
                      <?php $zz = $web->tgl_ujian; ?>
                      <td><?php echo date('d-m-Y', strtotime($zz)); ?></td>
                    </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
      </div>

    </div>
    <!-- /dashboard content -->
