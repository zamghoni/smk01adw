<div class="panel panel-success">
  <div class="panel-heading">
    <h2><strong class="text" style="color:#303b45;">Data Siswa</strong></h2>
  </div>
  <div class="panel-body">


<div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label"style="text-align:right; margin-top:6px">N.I.S.N <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="nisn" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="10" placeholder="Nomor Induk Siswa Nasional" data-parsley-group="block1" data-parsley-errors-container='div[id="error-nisn"]' required>
        <i class="fa fa-users" style="margin-left:15px;"></i>
        <div id="error-nisn" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Sesuai dengan NISN</div>
      </div>
  </div>

  <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nama Lengkap <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control bg-blue" placeholder="Nama lengkap Calon Siswa" maxlength="100" data-parsley-group="block1" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-nama_lengkap"]' required>
        <i class="fa fa-user" style="margin-left:15px;"></i>
        <div id="error-nama_lengkap" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Sesuai dengan ijazah</div>
      </div>
  </div>

  <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:-3px">Jenis Kelamin <span class="text-danger">*</span></label>
      <div class="col-sm-9">

      <div class="radio" style="margin-top:3px;margin-left:-20px;">
          <label>
          <input type="radio" value="Laki-Laki" name="jk" data-parsley-group="block1" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error"]' required> <i class="fa fa-male"></i> &nbsp;Laki-laki
          </label>
        </div>
        <div class="radio" style="margin-left:-20px;">
          <label>
          <input type="radio" value="Perempuan" name="jk" data-parsley-group="block1" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error"]' required> <i class="fa fa-female"></i> &nbsp;Perempuan
          </label>
        </div>
        <div id="condition-error" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
  </div>

  <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Tempat Kelahiran <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" >
        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control bg-blue class" placeholder="Tempat Kelahiran Calon Siswa" data-parsley-group="block1" data-parsley-errors-container='div[id="error-tempat_lahir"]' required>
        <i class="fa fa-building" style="margin-left:15px;"></i>
        <div id="error-tempat_lahir" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
  </div>

 <div class="form-group" >
    <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Tanggal Kelahiran <span class="text-danger">*</span></label>
    <div class="col-sm-9" style="margin-top:3px;">
      <div class="col-sm-4" style="padding:0px">
         <select class="form-control bg-blue class"  name="tgl_lahir" data-parsley-group="block1" data-parsley-errors-container='div[id="error-tgl_lahir"]' required>
              <option value="" selected>Pilih Tanggal</option>
              <?php for ($i=1; $i <=31 ; $i++) {
                if ($i < 10) {
                  $i = "0".$i;
                }?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?>
         </select>
         <div id="error-tgl_lahir" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
      <div class="col-sm-4"  style="padding-left:3px;">
        <select class="form-control bg-blue class" data-placeholder="Pilih Bulan" name="bln_lahir" data-parsley-group="block1" data-parsley-errors-container='div[id="error-bln_lahir"]' required>
              <option value="" selected>Pilih Bulan</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
         </select>
        <div id="error-bln_lahir" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
      <div class="col-sm-4" style="margin-left:-27px;">

         <select class="form-control bg-blue class" data-placeholder="Pilih Tahun Lahir" name="thn_lahir" data-parsley-group="block1" data-parsley-errors-container='div[id="error-thn_lahir"]' required>
          <option value="" selected>Pilih Tahun Lahir</option>
          <?php
          $thn_max=date('Y');
          for ($i=1990; $i <= $thn_max; $i++) {?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php } ?>
         </select>
          <div id="error-thn_lahir" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>

    </div>
</div>

<div class="form-group" style="padding-bottom:30px;">
        <label class="col-sm-3 control-label"style="text-align:right; margin-top:6px">Agama <span class="text-danger">*</span></label>
        <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
          <input type="text" name="agama" value="<?php echo "Islam"; ?>" class="form-control bg-blue class" data-parsley-group="block1" data-parsley-errors-container='div[id="error-agama"]' readonly>
          <i class="fa fa-users" style="margin-left:15px;"></i>
          <div id="error-anak_ke" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        </div>
    </div>

<div class="form-group" style="padding-bottom:30px;">
        <label class="col-sm-3 control-label"style="text-align:right; margin-top:6px">Anak Ke- <span class="text-danger">*</span></label>
        <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
          <input type="text" name="anak_ke" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="2" placeholder="Anak Ke- " data-parsley-group="block1" data-parsley-errors-container='div[id="error-anak_ke"]' required>
          <i class="fa fa-users" style="margin-left:15px;"></i>
          <div id="error-anak_ke" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        </div>
    </div>

  <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label"style="text-align:right; margin-top:6px">Saudara Kandung <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="jml_saudara_kandung" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="2" placeholder="Jumlah Saudara Kandung" data-parsley-group="block1" data-parsley-errors-container='div[id="error-jml_saudara_kandung"]' required>
        <i class="fa fa-users" style="margin-left:15px;"></i>
        <div id="error-jml_saudara_kandung" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
  </div>
  <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label"style="text-align:right; margin-top:6px">Saudara Tiri</label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="jml_saudara_tiri" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="2" placeholder="Jumlah Saudara Tiri" data-parsley-group="block1" data-parsley-errors-container='div[id="error-jml_saudara_tiri"]'>
        <i class="fa fa-users" style="margin-left:15px;"></i>
        <div id="error-jml_saudara_tiri" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
  </div>


        <div class="form-group" >
            <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Alamat <span class="text-danger">*</span></label>
            <div class="col-sm-9 prepend-icon" style="margin-top:3px;">
              <input type="text" name="alamat_siswa" class="form-control bg-blue class" placeholder="Alamat Calon Siswa" data-parsley-group="block1" data-parsley-errors-container='div[id="error-alamat_siswa"]' required>
              <i class="fa fa-map-marker" style="margin-left:15px;"></i>
              <div id="error-alamat_siswa" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
            </div>
        </div>
        <div class="form-group" >
            <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">No. Handphone Siswa <span class="text-danger">*</span></label>
            <div class="col-sm-9 prepend-icon" style="margin-top:3px;">
              <input type="text" name="telp_siswa" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="13" placeholder="No. Handphone Siswa" data-parsley-group="block2" data-parsley-errors-container='div[id="error-telp_siswa"]' required>
              <i class="fa fa-phone" style="margin-left:15px;"></i><br>
              <small>Masukkan dengan format 62, Contoh 6289123432311</small>
              <div id="error-telp_siswa" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
            </div>
        </div>
        <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:-3px">Pilihan Jurusan <span class="text-danger">*</span></label>
      <div class="col-sm-9">

      <div class="radio" style="margin-top:3px;margin-left:-20px;">
          <label>
          <input type="radio" value="Teknik Kendaraan Ringan (TKR)" name="jurusan" data-parsley-group="block1" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error-jurusan"]' required> <i class="fa fa-cogs"></i> &nbsp;Teknik Kendaraan Ringan (TKR)
          </label>
        </div>
        <div class="radio" style="margin-left:-20px;">
          <label>
          <input type="radio" value="Teknik Komputer Jaringan (TKJ)" name="jurusan" data-parsley-group="block1" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error-jurusan"]' required> <i class="fa fa-desktop"></i> &nbsp;Teknik Komputer Jaringan (TKJ)
          </label>
        </div>
        <div class="radio" style="margin-left:-20px;">
          <label>
          <input type="radio" value="Akuntansi" name="jurusan" data-parsley-group="block1" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error-jurusan"]' required> <i class="glyphicon glyphicon-list-alt"></i> &nbsp;Akuntansi
          </label>
        </div>
        <div id="condition-error-jurusan" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
  </div>

      </div>
    </div>
    <div class="panel panel-success">
      <div class="panel-heading">
        <h2><strong class="text" style="color:#303b45;">Data Minat Bakat</strong></h2>
      </div>

      <div class="panel-body">
      <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">No Piagam </label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="no_piagam" class="form-control bg-blue" placeholder="Nomor Piagam" maxlength="100" data-parsley-group="block3" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-no_piagam"]'>
        <i class="fa fa-university" style="margin-left:15px;"></i>
        <div id="error-no_piagam" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
  </div>
    <div class="panel-body">
      <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nama Prestasi </label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="nama_prestasi" id="nama_prestasi" class="form-control bg-blue" placeholder="Nama Prestasi" maxlength="100" data-parsley-group="block3" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-nama_prestasi"]'>
        <i class="fa fa-university" style="margin-left:15px;"></i>
        <div id="error-nama_prestasi" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
  </div>


<div class="form-group">
    <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Juara Ke- </label>
    <div class="col-sm-9" style="margin-top:3px;">
      <select class="form-control bg-blue class" data-placeholder="Pilih Juara" name="juara_ke" data-parsley-group="block3" data-parsley-errors-container='div[id="error-juara_ke"]'>
              <option value="">-- Pilih --</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
      </select>
      <div id="error-juara_ke" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Tingkat </label>
    <div class="col-sm-9" style="margin-top:3px;">
      <select class="form-control bg-blue class" data-placeholder="Tingkat Kompetisi" name="tingkat" data-parsley-group="block3" data-parsley-errors-container='div[id="error-tingkat"]'>
              <option value="">-- Pilih --</option>
              <option value="Desa/Kelurahan">Desa/Kelurahan</option>
              <option value="Kecamatan">Kecamatan</option>
              <option value="Kab/Kota">Kab/Kota</option>
              <option value="Provinsi">Provinsi</option>
              <option value="Nasional">Nasional</option>
              <option value="Internasional">Internasional</option>
      </select>
      <div id="error-tingkat" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
    </div>
</div>

        <div class="form-group" >
            <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Tahun </label>
            <div class="col-sm-9 prepend-icon" style="margin-top:3px;">
              <select class="form-control bg-blue class" data-placeholder="Pilih Tahun prestasi" name="tahun_prestasi" data-parsley-group="block1" data-parsley-errors-container='div[id="error-tahun_prestasi"]'>
          <option value="" selected>Pilih Tahun prestasi</option>
          <?php
          $thn_max=date('Y');
          for ($i=2000; $i <= $thn_max; $i++) {?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php } ?>
         </select>
            </div>
        </div>
   <!--     <div class="form-group" >
            <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nilai Bakat </label>
            <div class="col-sm-9 prepend-icon" style="margin-top:3px;">
              <input type="text" name="nilai_bakat" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="2" placeholder="Nilai Bakat" data-parsley-group="block3" data-parsley-errors-container='div[id="error-nilai_bakat"]'>
              <div id="error-nilai_bakat" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
            </div>
        </div> -->
    </div>
  </div>
  <div class="panel panel-success">
      <div class="panel-heading">
        <h2><strong class="text" style="color:#303b45;">Data Sekolah & Ijazah</strong></h2>
      </div>
  <div class="panel-body">
    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nomor Ijazah </label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="nomor_ijazah" class="form-control bg-blue" maxlength="20" placeholder="Nomor Ijazah" maxlength="100" data-parsley-group="block3" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-nomor_ijazah"]'>
        <i class="fa fa-university" style="margin-left:15px;"></i>
        <div id="error-nomor_ijazah" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
  </div>


<div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Asal Sekolah <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="asal_sekolah" class="form-control bg-blue" placeholder="Sekolah Asal" maxlength="100" data-parsley-group="block3" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-asal_sekolah"]' required>
        <i class="fa fa-university" style="margin-left:15px;"></i>
        <div id="error-asal_sekolah" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
  </div>

  <!-- setting input -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
  function testInput(event) {
    var value = String.fromCharCode(event.which);
    var pattern = new RegExp(/[a-zåäö ]/i);
    return pattern.test(value);
  }

  $('#nama_lengkap').bind('keypress', testInput);
  $('#tempat_lahir').bind('keypress', testInput);
  $('#nama_prestasi').bind('keypress', testInput);
  </script>

  <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Alamat Sekolah <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="alamat_sekolah" class="form-control bg-blue" placeholder="Alamat Sekolah Asal" maxlength="100" data-parsley-group="block3" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-alamat_sekolah"]' required>
        <i class="fa fa-map-marker" style="margin-left:15px;"></i>
        <div id="error-alamat_sekolah" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
  </div>

        <div class="form-group" >
            <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Tahun Lulus <span class="text-danger">*</span></label>
            <div class="col-sm-9 prepend-icon" style="margin-top:3px;">
              <select class="form-control bg-blue class" data-placeholder="Pilih Tahun Lulus" name="tahun_lulus" data-parsley-group="block1" data-parsley-errors-container='div[id="error-tahun_lulus"]' required>
          <option value="" selected>Pilih Tahun Lulus</option>
          <?php
          $thn_max=date('Y');
          for ($i=2017; $i <= $thn_max; $i++) {?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php } ?>
         </select>
            </div>
        </div>

        <input type="hidden" name="mtk" step="any" min="0" max="100" class="form-control bg-blue class your_class" placeholder="Nilai Matematika" data-parsley-group="block3" data-parsley-errors-container='div[id="error-mtk"]'>

        <div class="form-group" >
            <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nilai Matematika </label>
            <div class="col-sm-9 prepend-icon" style="margin-top:3px;">
              <input type="number" name="mtk" id="mtk" step="any" min="0" max="100" class="form-control bg-blue class your_class" placeholder="Nilai Matematika" data-parsley-group="block3" data-parsley-errors-container='div[id="error-mtk"]'><br>
              <small>Masukkan koma dengan tanda titik (.)</small>
              <div id="error-mtk" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
            </div>
        </div>
        <div class="form-group" >
            <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nilai Bahasa Indonesia </label>
            <div class="col-sm-9 prepend-icon" style="margin-top:3px;">
              <input type="number" name="ind" id="ind" step="any" min="0" max="100" class="form-control bg-blue class your_class" placeholder="Nilai Bahasa Indonesia" data-parsley-group="block3" data-parsley-errors-container='div[id="error-ind"]'><br>
              <small>Masukkan koma dengan tanda titik (.)</small>
              <div id="error-ind" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
            </div>
        </div>
        <div class="form-group" >
            <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nilai Bahasa Inggris </label>
            <div class="col-sm-9 prepend-icon" style="margin-top:3px;">
              <input type="number" name="ing" id="ing" step="any" min="0" max="100" class="form-control bg-blue class your_class" maxlength="4" placeholder="Nilai Bahasa Inggris" data-parsley-group="block3" data-parsley-errors-container='div[id="error-ing"]'>
              <small>Masukkan koma dengan tanda titik (.)</small>
              <div id="error-ind" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
            </div>
        </div>
        <div class="form-group" >
            <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nilai I.P.A </label>
            <div class="col-sm-9 prepend-icon" style="margin-top:3px;">
              <input type="number" name="ipa" id="ipa" step="any" min="0" max="100" class="form-control bg-blue class your_class" maxlength="4" placeholder="Nilai I.P.A" data-parsley-group="block3" data-parsley-errors-container='div[id="error-ipa"]'><br>
              <small>Masukkan koma dengan tanda titik (.)</small>
              <div id="error-ipa" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
            </div>
        </div>
        <div class="form-group" >
            <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Rata-Rata U.N</label>
            <div class="col-sm-9 prepend-icon" style="margin-top:3px;">
              <input type="text" name="jml" id="jml" class="form-control bg-blue class your_class" maxlength="15" placeholder="Jumlah Nilai Ujian Nasional" data-parsley-group="block3" data-parsley-errors-container='div[id="error-jml"]' readonly="">
              <div id="error-jml" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
            </div>
        </div>

  </div>
</div>


<div class="col-md-12">
  <hr>
  <blockquote>
    <p><b>CATATAN:</b> Field isian dengan tanda <span class="text-danger ">*</span><b class="text-danger">wajib diisi</b>.</p>
  </blockquote>
<div>
<script type="text/javascript" src="assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
        $(".form-control").keyup(function() {
            var mtk  = parseFloat($("#mtk").val())
            var ind = parseFloat($("#ind").val())
            var ing = parseFloat($("#ing").val())
            var ipa = parseFloat($("#ipa").val())

            mtk = isNaN(mtk) ? 0 : mtk
            ind = isNaN(ind) ? 0 : ind
            ing = isNaN(ing) ? 0 : ing
            ipa = isNaN(ipa) ? 0 : ipa

            var jml = ((mtk + ind + ing + ipa)/4).toFixed(2);

            $('#jml').attr("value",jml)

        });
        document.querySelector(".your_class").addEventListener("keypress", function (evt) {
    if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
    {
        evt.preventDefault();
    }
});
</script>
