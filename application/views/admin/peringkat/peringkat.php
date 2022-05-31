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
          <h5 class="panel-title"> Master Kelulusan</h5>
          <hr style="margin:0px;">
          <br>
          <a href="<?php echo base_url('panel_admin/peringkat_cetak'); ?>"><span class="btn btn-success">Cetak Data</span></a>
          <div class="col-md-3" style="float:right;margin-right:25px;">
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>

      <br>

                    

        </div>
        <div class="table-responsive">
        <table class="table datatable-basic table-bordered" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>No. Pendaftaran</th>
              <th>Jumlah Nilai UN</th>
              <th>Nilai Test Wawancara</th>
              <th>Nilai CBT</th>
              <th>Rata Rata Nilai</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_siswa->result() as $baris) {?>
                <tr>
                  <?php $hasil = ($baris->jml_nilai_un)+($baris->nilai_pai)+($baris->nilai); ?>
                  <?php $rata = $hasil/5 ?>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $baris->no_pendaftaran; ?></td>
                  <td><?php echo $baris->jml_nilai_un; ?></td>
                  <td><?php echo $baris->nilai_pai; ?></td>
                  <td><?php echo $baris->nilai; ?></td>
                  <td><?php echo $rata; ?></td>
                  <td align="center">
                    <?php if ($rata < 70) {?>
                      <label class="label label-danger">Tidak Lulus</label>
                    <?php }else if($rata >= 70){ ?>
                      <label class="label label-success">Lulus</label>
                    <?php }else{ ?>
                      <label>-</label>
                    <?php } ?>
                  </td>
                 <td align="center">
                    <a href="panel_admin/cetak_data_nilai/<?php echo $baris->no_pendaftaran; ?>" class="btn btn-default btn-xs" title="Cetak Data Nilai" target="_blank"><i class="glyphicon glyphicon-print"></i></a>
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
      window.location = "panel_admin/peringkat/thn/"+thn;
  }

  $('[name="thn"]').select2({
      placeholder: "- Tahun -"
  });

</script>

