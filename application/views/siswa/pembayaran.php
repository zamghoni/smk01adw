<script type="text/javascript" src="assets/panel/ckeditor/ckeditor.js"></script>
<style>
  label{font-weight: bold;}
</style>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

<?php
error_reporting(0);
$user = $user->row();
$zz = $ttl->row();
$aa = $asa->row();
?>
    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="panel panel-flat">

            <div class="panel-body">
<a href="panel_admin/seleksi" class="btn btn-primary"><< Kembali</a>
              <fieldset class="content-group">
                <legend class="text-bold"> Pembayaran</legend>
                    <label class="control-label col-lg-2">Nama :</label>
                    <div class="col-lg-4">
                      <label><?php echo $user->nama_lengkap; ?></label>
                    </div>
                    <label class="control-label col-lg-2">Status :</label>
                    <div class="col-lg-4">
                      <label><?php if ($zz->jumlah >= $aa->nominal) {?>
                      <label class="label label-success">Sudah Lunas</label>
                    <?php }else{ ?>
                      <label class="label label-danger">Belum Lunas</label>
                    <?php } ?></label>
                    </div>
 

              </fieldset>
              <fieldset class="content-group">
                    <label class="control-label col-lg-6">Total uang yang sudah dibayarkan :</label>
                    <div class="col-lg-6W">
                      <label>Rp <?= number_format($zz->jumlah) ?></label>
                    </div>

              </fieldset>
              <fieldset class="content-group">
                    <label class="control-label col-lg-6">Total yang harus dibayar :</label>
                    <div class="col-lg-6W">
                      <label>Rp <?= number_format($aa->nominal) ?></label>
                    </div>

              </fieldset>
              <hr>
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Pembayaran
              </button>
              <hr>

              <div class="table-responsive">
        <table class="table datatable-basic table-bordered" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Jenis Pembayaran</th>
              <th>Jumlah</th>
              <th>Bukti Pembayaran</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($bayar->result() as $baris) {?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td align="center">
                    <?php if ($baris->jenis_pembayaran == '1') {?>
                      Biaya Pendaftaran
                    <?php }else if ($baris->jenis_pembayaran == '2'){ ?>
                      Biaya Daftar Ulang
                    <?php }else{ ?>
                      -
                    <?php } ?>
                  </td>
                  <td>Rp. <?= number_format($baris->jumlah,0,',','.') ?></td>
                  <td><img width="100" height="100" src="<?php echo base_url().'files/bukti_pembayaran/'.$baris->bukti ?> ?>"></td>
                  <td align="center">
                    <?php if ($baris->status == '1') {?>
                      <label class="label label-success">Berhasil</label>
                    <?php }else if ($baris->status == '2'){ ?>
                      <label class="label label-warning">Belum Di Konfirmasi</label>
                    <?php }else{ ?>
                      <label class="label label-danger">Belum Bayar</label>
                    <?php } ?>
                  </td>
                </tr>
              <?php
              } ?>
          </tbody>
        </table>
        </div>


            </div>

        </div>
      </div>
    </div>
    <!-- /dashboard content -->
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <?php
              echo $this->session->flashdata('msg');
              ?>
              <form class="form-horizontal" action="panel_siswa/pembayaran_act" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-lg-3">Jenis Pembayaran</label>
                  <div class="col-lg-9">
                    <select name="jenis_pembayaran" class="form-control" >
                        <option value="">- Pilih -</option>
                        <option value="1">Bayar Pendaftaran</option>
                        <option value="2">Bayar Daftar Ulang</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Jumlah Bayar</label>
                  <div class="col-lg-9">
                    <input type="text" name="jumlah" class="form-control" maxlength="100">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Upload Bukti</label>
                  <div class="col-lg-9">
                    <input type="file" name="bukti" class="form-control">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>