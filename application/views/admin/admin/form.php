<!-- Main content -->
<div class="content-wrapper">

  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">

      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Tambah Admin</legend>
              <?php
              echo $this->session->flashdata('msg');
              ?>
              <form class="form-horizontal" action="<?=site_url('admin/process')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?=$row->id_user?>">
                <div class="form-group">
                  <label class="control-label col-lg-3">Username</label>
                  <div class="col-lg-9">
                    <input type="text" name="username" class="form-control" value="<?php echo $row->username; ?>" placeholder="Username" required autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Password</label>
                  <div class="col-lg-9">
                    <input type="password" name="password" class="form-control" value="<?php echo $row->password; ?>" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Nama Lengkap</label>
                  <div class="col-lg-9">
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $row->nama_lengkap; ?>" placeholder="Nama Lengkap" maxlength="100" required>
                  </div>
                </div>

            </fieldset>
            <div class="col-md-12">
              <hr style="margin-top:-10px;">
              <a href="<?=site_url('admin')?>" class="btn btn-warning" style="float:left;">Kembali</a>
              <button type="submit" name="<?=$subpage?>" class="btn btn-primary" style="float:right;">Simpan</button>
            </div>
          </form>
          </div>
      </div>
      </div>


    </div>
    <!-- /dashboard content -->
