<!-- Main content -->
<div class="content-wrapper">

  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
          <div class="panel-body">
            <br>
          </form>
      </div>

      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Tambah Nilai Ujian Tes Tulis Potensi Akademik</legend>
              <?php
              echo $this->session->flashdata('msg');
              ?>
              <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label class="control-label col-lg-3">No Pendaftaran</label>
                  <div class="col-lg-9">
                    <input type="text" name="no_pendaftaran" class="form-control" value="<?php echo $ujian->no_pendaftaran; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-3">Tanggal Ujian</label>
                  <div class="col-lg-9">
                    <input type="text" name="tanggal" class="form-control" value="<?php echo $ujian->tanggal; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-3">No Test</label>
                  <div class="col-lg-9">
                    <input type="text" name="no_test" class="form-control" value="<?php echo $ujian->no_test; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Nama Lengkap</label>
                  <div class="col-lg-9">
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $ujian->nama; ?>" placeholder="Nama Lengkap" maxlength="100" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Ruang Ujian</label>
                  <div class="col-lg-9">
                    <select name="ruang_ujian" class="form-control" >
                        <option value="">- Ruang Ujian -</option>
                        <?php foreach($tbl_ruang_ujian as $k){ ?>
                        <option <?php if(set_value('tbl_ruang_ujian') == $k->id){echo "selected='selected'";} ?> value="<?php echo $k->id ?>"><?php echo $k->nama_ruang; ?></option>
                                    <?php } ?>
                    </select>
                  </div>
                </div>

                <!-- disini mempengaruhi pringkat .......-->
                <div class="form-group">
                  <label class="control-label col-lg-3">Nilai Bakat</label>
                  <div class="col-lg-9">
                    <input type="text" name="nilai_bakat" class="form-control" value="<?php echo $nilai->nilai_bakat; ?>" placeholder="Nilai Ujian Seleksi" maxlength="5" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Nilai Rapot</label>
                  <div class="col-lg-9">
                    <input type="text" name="nilai_rapot" class="form-control" value="<?php echo $nilai->nilai_rapot; ?>" placeholder="Nilai Ujian Seleksi" maxlength="5" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Nilai UN</label>
                  <div class="col-lg-9">
                    <input type="text" name="nilai_un" class="form-control" value="<?php echo $nilai->nilai_un; ?>" placeholder="Nilai Ujian Seleksi" maxlength="5" readonly>
                  </div>
                </div> 
                <!--               -->
                <div class="form-group">
                  <label class="control-label col-lg-3">Nilai PAI (Seleksi)</label>
                  <div class="col-lg-9">
                    <input type="text" name="nilai_pai" class="form-control" value="<?php echo $ujian->nilai_pai; ?>" placeholder="Nilai Ujian Seleksi" maxlength="5" required>
                  </div>
                </div>

            </fieldset>
            <div class="col-md-12">
              <hr style="margin-top:-10px;">
              <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Simpan</button>
            </div>
          </form>
          </div>
      </div>
      </div>


    </div>
    <!-- /dashboard content -->
