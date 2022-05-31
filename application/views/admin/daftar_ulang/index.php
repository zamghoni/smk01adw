<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <?php
    echo $this->session->flashdata('msg');
    ?>
    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"> Pembayaran</h5>
          <hr style="margin:0px;">
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>

                    <br>
                    <a href="panel_admin/edit_nominal" class="btn btn-primary">Edit Rincian Pembayaran</a>

        </div>
        <div class="table-responsive">
        <table class="table datatable-basic table-bordered" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>No. Pendaftaran</th>
              <th>Bukti Pembayaran</th>
              <th>Nominal</th>
              <th>Status Pembayaran</th>
              <th class="text-center" width="220">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_siswa->result() as $baris) {?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $baris->pendaftaran; ?></td>
                  <td align="center"><a class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal<?php echo $baris->id_pembayaran; ?>"><i class="glyphicon glyphicon-search"></i></a></td>
                  <td>Rp. <?= number_format($baris->jumlah,0,',','.') ?></td>
                  <td align="center">
                    <?php if ($baris->status == '1') {?>
                      <label class="label label-success">Berhasil</label>
                    <?php }else if ($baris->status == '2'){ ?>
                      <label class="label label-warning">Belum Di Konfirmasi</label>
                    <?php }else{ ?>
                      <label class="label label-danger">Belum Bayar</label>
                    <?php } ?>
                  </td>
                  <td align="center">
                    <?php if ($baris->status == '2') {?>
                      <a href="panel_admin/daftar_ulang/yes/<?php echo $baris->id_pembayaran; ?>" class="btn btn-success btn-xs" title="yes" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-checkmark4"></i> Konfirmasi</a>
                    <?php }else if($baris->status == '1'){ ?>
                      <a href="panel_admin/daftar_ulang/batal/<?php echo $baris->id_pembayaran; ?>" class="btn btn-danger btn-xs" title="batal" onclick="return confirm('Apakah Anda yakin ingin mengcancel pembayaran?')"><i class="icon-cross3"></i> Cancel</a>
                    <?php } else{ ?>
                      -
                    <?php } ?>
                  </td>
                </tr>
                <!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $baris->id_pembayaran; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <img width="500" height="535" src="<?php echo base_url().'files/bukti_pembayaran/'.$baris->bukti ?> ?>">
              
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
              <?php
              } ?>
          </tbody>
        </table>
        </div>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->

<script type="text/javascript">
  function thn()
  {
    var thn = $('[name="thn"]').val();
      window.location = "panel_admin/daftar_ulang/thn/"+thn;
  }

  $('[name="thn"]').select2({
      placeholder: "- Tahun -"
  });

</script>
