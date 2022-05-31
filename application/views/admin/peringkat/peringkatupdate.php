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
              <legend class="text-bold"><i class="icon-user"></i> UPDATE DATA Nilai </legend>
              <?php
              echo $this->session->flashdata('msg');
              ?>
              <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label class="control-label col-lg-3">No Pendaftaran</label>
                  <div class="col-lg-9">
                    <input type="text" name="no_pendaftaran" class="form-control" value="<?php echo $nilai->no_pendaftaran; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-3">Nama Lengkap</label>
                  <div class="col-lg-9">
                    <input type="text" name="nama" class="form-control" value="<?php echo $nilai->nama; ?>" placeholder="Nama Lengkap" maxlength="100" readonly>
                  </div>
                </div>


                <!--
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
                </div> -->
                <div class="form-group">
                  <label class="control-label col-lg-3">Nilai PAI (Seleksi)</label>
                  <div class="col-lg-9">
                    <input type="text" name="nilai_seleksi" class="form-control" value="<?php echo $ujian->nilai_pai; ?>" placeholder="Nilai Ujian Seleksi" maxlength="5" readonly>
                  </div>
                </div>
<!--tambahan===-->
               <div class="form-group">
                  <label class="control-label col-lg-3">Total Nilai</label>
                  <div class="col-lg-9">
                    <input type="text" name="total_nilai" class="form-control" value="<?php echo $nilai->total_nilai; ?>" placeholder="Total Nilai" maxlength="100" disabled>
                  </div>
                </div>

               <div class="form-group">
                  <label class="control-label col-lg-3">Rata-Rata Nilai</label>
                  <div class="col-lg-9">
                    <input type="text" name="rata_rata" class="form-control" value="<?php echo $nilai->rata_rata; ?>" placeholder="Rata Raata Nilai" maxlength="100" disabled>
                  </div>
                </div>

               <div class="form-group">
                  <label class="control-label col-lg-3">Keterangan</label>
                  <div class="col-lg-9">
                    <input type="text" name="keterangan" class="form-control" value="<?php echo $nilai->keterangan; ?>" placeholder="Keterangan" maxlength="100" disabled>
                  </div>
                </div>

               <div class="form-group">
                  <label class="control-label col-lg-3">Registered</label>
                  <div class="col-lg-9">
                    <input type="text" name="registered" class="form-control" value="<?php echo $nilai->registered; ?>" placeholder="Registrasi" maxlength="100" enabled>
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
