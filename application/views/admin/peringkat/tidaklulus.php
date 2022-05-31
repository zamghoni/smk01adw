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
          <h5 class="panel-title"> Data Tidak Lulus</h5>
          <hr style="margin:0px;">
          <br>
          <a href="<?php echo base_url('panel_admin/peringkat_cetak_tidaklulus'); ?>"><span class="btn btn-success">Cetak Data Tidak Lulus</span></a>
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
              <th>Nama Lengkap</th>
              <th>Nilai Bakat</th>
              <th>Nilai Rata2 Rapor</th>
              <th>Jml Nilai UN</th>
              <th>Nilai Ujian</th>
              <th>Total Nilai</th>
              <th>Rata Rata Nilai </th>
              <th>keterangan </th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_siswa->result() as $baris) {?>
                <tr>
                  <?php 
                    $jumlah = $baris->nilai_bakat + $baris->nilai_rapot + $baris->nilai_un + $baris->nilai_seleksi; 
              $rata = $jumlah/4;
                   ?>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $baris->no_pendaftaran; ?></td>
                  <td><?php echo $baris->nama; ?></td>
                  <td><?php echo $baris->nilai_bakat; ?></td>
                  <td><?php echo $baris->nilai_rapot; ?></td>
                  <td><?php echo $baris->nilai_un; ?></td>
                  <td><?php echo $baris->nilai_seleksi; ?></td>
                  <td><?php echo $jumlah; ?></td>
                  <td><?php echo $rata; ?></td>
                  <td><?php echo $baris->keterangan; ?> </td>
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

