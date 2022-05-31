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
          <h5 class="panel-title"> Nilai Wawancara</h5>
          <hr style="margin:0px;">
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
              <?php $zz = $web->tgl_ujian; ?>
                    <br>
                    <a href="panel_admin/edit_tanggal_ujian" class="btn btn-primary">Edit Tanggal Ujian</a>
                    <label class="btn btn-success"> Tanggal Ujian : <?php echo date('d-m-Y', strtotime($zz)); ?></label>

                    

        </div>
        <div class="table-responsive">
        <table class="table datatable-basic table-bordered" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>No. Pendaftaran</th>
              <th>No. Test</th>
              <th>Nama Lengkap</th>
              <th>Nilai</th>
              <th class="text-center" width="130">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_siswa->result() as $baris) {

                // $this->db->where('no_pendaftaran',$baris->no_pend);
                // $cek = $this->db->get('tbl_siswa')->row();

                // if($cek->status_verifikasi == 1){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $baris->no_pend; ?></td>
                  <td><?php echo $baris->no_test; ?></td>
                  <td><?php echo $baris->nama; ?></td>
                  <form method="post" action="<?php echo base_url('panel_admin/wawancara_add') ?>">
                  <td>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $baris->id_ujian; ?>">
                        <input type="text" name="nilai_pai" class="form-control" value="<?php echo $baris->nilai_pai; ?>" maxlength="5" required>
                  </td>
                  <td align="center">
                  <!--  <a href="panel_admin/ujian_cetak/<?php echo $baris->no_pendaftaran; ?>" class="btn btn-default btn-xs" title="Cetak Hasil Seleksi" target="_blank"><i class="glyphicon glyphicon-print"></i></a> -->
                      <button class="btn btn-info btn-xs" title="Ujian"><i class="glyphicon glyphicon-pencil"></i> Update</button>
                  </td>
                  </form>
                </tr>
              <?php
              // } 
            }?>
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
      window.location = "panel_admin/seleksi/thn/"+thn;
  }

  $('[name="thn"]').select2({
      placeholder: "- Tahun -"
  });

</script>

