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
          <h5 class="panel-title"> Data Nilai CBT</h5>
          <hr style="margin:0px;">
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>

                    <br>
                    <a href="panel_admin/ujactiveall" class="btn btn-primary">Aktifkan Seluruh Peserta</a>
                    <a href="panel_admin/ujdelall" class="btn btn-info">Kunci Semua</a>
                    <div class="col-md-3" style="float:right;margin-right:25px;">
                      <div class="input-group">
                        <div class="input-group-addon"><i class="icon-calendar22"></i></div>
                        <select class="form-control" name="thn" onchange="thn()">
                          <?php for ($i=date('Y'); $i >=2018 ; $i--) {?>
                            <option value="<?php echo $i; ?>" <?php if($v_thn==$i){echo "selected";} ?>>Tahun <?php echo $i; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

        </div>
        <div class="table-responsive">
        <table class="table datatable-basic table-bordered" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>No. Pendaftaran</th>
              <th>Nama Lengkap</th>
              <th>Jurusan</th>
              <th class="text-center" width="130">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_siswa->result() as $baris) {?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $baris->nim; ?></td>
                  <td><?php echo $baris->nama; ?></td>
                  <td> <?php echo $baris->jurusan; ?></td>
                  <td align="center">
                      <a href="panel_admin/verifikasi/cek/<?php echo $baris->id; ?>" class="btn btn-info btn-xs" title="Verifikasi" onclick="return confirm('apakah anda yakin ingin mengubah data?')"><i class="icon-checkmark4"></i></a>
                      <a href="panel_admin/verifikasi/cek/<?php echo $baris->id; ?>" class="btn btn-danger btn-xs" title="Batal Verifikasi" onclick="return confirm('apakah anda yakin ingin mengubah data?')"><i class="icon-cross3"></i></a>
                  </td>
                </tr>
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
      window.location = "panel_admin/ujian_active/thn/"+thn;
  }

  $('[name="thn"]').select2({
      placeholder: "- Tahun -"
  });

</script>
