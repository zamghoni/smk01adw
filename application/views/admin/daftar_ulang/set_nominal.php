<script type="text/javascript" src="assets/panel/ckeditor/ckeditor.js"></script>
<style>
  label{font-weight: bold;}
</style>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="panel panel-flat">

            <div class="panel-body">

              <fieldset class="content-group">
                <legend class="text-bold"> Edit Nominal Daftar Ulang</legend>
                <?php
                echo $this->session->flashdata('msg');
                ?>
                <form class="form-horizontal" action="" method="post">
                  <div class="form-group">
                    <label class="control-label col-lg-12">Biaya Pendaftaran :</label>
                    <div class="col-lg-12">
                      <input type="number" name="pendaftaran" class="form-control" value="<?php echo $ket->pendaftaran; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-12">Biaya Daftar Ulang :</label>
                    <div class="col-lg-12">
                      <input type="number" name="nominal" class="form-control" value="<?php echo $ket->nominal; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-12">Total Biaya Keseluruhan :</label>
                    <div class="col-lg-12">
                      <?php $total = $ket->pendaftaran+$ket->nominal; ?>
                      <p>Rp <?=number_format($total);?></p>
                    </div>
                  </div>
                  <hr>
                  <a href="panel_admin/daftar_ulang" class="btn btn-default"><< Kembali</a>
                  <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Simpan</button>
                </form>

              </fieldset>


            </div>

        </div>
      </div>
    </div>
    <!-- /dashboard content -->

<script type="text/javascript">
CKEDITOR.replace( 'ket_pengumuman',
{
  fullPage : true,
  removeButtons: 'Save',
  removePlugins: 'Save',
  toolbar: [
                { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
                { name: 'editing', items : [ 'Find','Replace'] },
                { name: 'document', items : [ 'Source'] },
                '/',
                { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript'] },
                { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
                { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
                { name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar'] },
                '/',
                { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize', 'lineheight'] },
                { name: 'colors', items : [ 'TextColor','BGColor' ] },
                { name: 'tools', items : [ 'Maximize','About', 'ShowBlocks' ] }
            ],
            extraPlugins: 'lineheight',
            line_height: "10px; 20px; 40px; 60px;"
            // line_height: '1em;1.1em;1.2em;1.3em;1.4em;1.5em'
            // line_height: "1px;1.1px;1.2px;1.3px;1.4px;1.5px"
});
</script>
