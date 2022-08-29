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
          <h5 class="panel-title"> Master Admin</h5>
          <hr style="margin:0px;">
          <br>
          <a href="<?php echo base_url('admin/add'); ?>"><span class="btn btn-success">Tambah Data</span></a>
          <div class="col-md-3" style="float:right;margin-right:25px;">
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
        </div>
        <br>
        <div class="table-responsive">
        <table class="table datatable-basic table-bordered" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Username</th>
              <th>Password</th>
              <th>Nama Lengkap</th>
              <th>Level</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_user->result() as $baris) {?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $baris->username; ?></td>
                  <td><?php echo $baris->password; ?></td>
                  <td><?php echo $baris->nama_lengkap; ?></td>
                  <td><?php echo $baris->level; ?></td>
                 <td align="center">
                     <!-- <a href="#" class="btn btn-xs btn-primary" title="Detail">Detail</a> -->
                     <a href="<?=site_url('admin/edit/'.$baris->id_user)?>" class="btn btn-xs btn-success" title="Edit">Edit</a>
                     <a href="<?=site_url('admin/del/'.$baris->id_user)?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('apakah anda ingin menghapus data ini?')">Hapus</a>
                  </td>
                </tr>
              <?php
              } ?>
          </tbody>
        </table>
        </div>
      </div>
      <!-- /basic datatable -->
      <script type="text/javascript" src="assets/panel/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="assets/panel/js/pages/datatables_basic.js"></script>
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
