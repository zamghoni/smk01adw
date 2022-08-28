<style>
  #tbl_input{width:50px;text-align: center;}
  #tbl_input2{width:100px;text-align: center;}
  #th_center > th {text-align: center;}
</style>


<div class="panel panel-success">
  <div class="panel-heading">
    <h2><strong class="text" style="color:#303b45;">Nilai Rapor</strong></h2>
  </div>
  <div class="panel-body">

  <div class="table-responsive">
    <table class="table table-bordered table-striped" width="100%" border="1">
      <tr id="th_center">
        <th rowspan="2">Mata Pelajaran</th>
        <th colspan="2">K.4</th>
		<th colspan="2">K.5</th>
		<th colspan="1">K.6</th>
        <th rowspan="2">Rata-Rata Nilai</th>
      </tr>
      <tr id="th_center">
        <th width="5">Smt 1</th>
        <th width="5">Smt 2</th>
        <th width="5">Smt 1</th>
        <th width="5">Smt 2</th>
        <th width="5">Smt 1</th>
      </tr>
      <tr>
        <td>Ilmu Pengetahuan Alam (IPA)</td>
        <?php for ($i=1; $i <=5 ; $i++) {?>
        <td>
          <input type="text" name="ipa<?php echo $i;?>" value="" onkeyup="hitung('ipa');" id="tbl_input" maxlength="2" data-parsley-group="block5" data-parsley-errors-container='div[id="error-ipa<?php echo $i;?>"]' required>
          <div id="error-ipa<?php echo $i;?>" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        </td>
        <?php } ?>
        <td>
          <b id="nilai_ipa">0</b>
          <input type="hidden" name="nilai_ipa" value="0">
        </td>
      </tr>

      <tr>
        <td>Matematika </td>
        <?php for ($i=1; $i <=5 ; $i++) {?>
        <td>
          <input type="text" name="mtk<?php echo $i;?>" value="" onkeyup="hitung('mtk');" id="tbl_input" maxlength="2" data-parsley-group="block5" data-parsley-errors-container='div[id="error-mtk<?php echo $i;?>"]' required>
          <div id="error-mtk<?php echo $i;?>" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        </td>
        <?php } ?>
        <td>
          <b id="nilai_mtk">0</b>
          <input type="hidden" name="nilai_mtk" value="0">
        </td>
      </tr>
      <tr>
        <td>Bahasa Indonesia </td>
        <?php for ($i=1; $i <=5 ; $i++) {?>
        <td>
          <input type="text" name="ind<?php echo $i;?>" value="" onkeyup="hitung('ind');" id="tbl_input" maxlength="3" data-parsley-group="block5" data-parsley-errors-container='div[id="error-ind<?php echo $i;?>"]' required>
          <div id="error-ind<?php echo $i;?>" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        </td>
        <?php } ?>
        <td>
          <b id="nilai_ind">0</b>
          <input type="hidden" name="nilai_ind" value="0">
        </td>
      </tr>
      <tr>
        <td>Bahasa Inggris </td>
        <?php for ($i=1; $i <=5 ; $i++) {?>
        <td>
          <input type="text" name="ing<?php echo $i;?>" value="" onkeyup="hitung('ing');" id="tbl_input" maxlength="3" data-parsley-group="block5" data-parsley-errors-container='div[id="error-ing<?php echo $i;?>"]' required>
          <div id="error-ing<?php echo $i;?>" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        </td>
        <?php } ?>
        <td>
          <b id="nilai_ing">0</b>
          <input type="hidden" name="nilai_ing" value="0">
        </td>
      </tr>
      <tr id="th_center">
        <th colspan="6">Rata-Rata Rapor</th>
        <th><b id="total_nilai">0</b></th>
        <input type="hidden" name="total_nilai" value="0">
      </tr>
      <tr>
        <th colspan="7">
          <div class="msg_error">

          </div>
        </th>
      </tr>
    </table>
  </div>
  </div>
</div>


<div class="col-md-12">
  <hr>
  <blockquote>
    <p><b>CATATAN:</b> <span class="text-danger ">Harap Nilai Raport Diisi Semua Dengan Yang Sesuai Di Raport ! </span><b class="text-danger"></b><br>
	<b>Keterangan:</b> <span class="text-danger ">K : Kelas | SMT : Semester </span><b class="text-danger"></b></p>
  </blockquote>
<div>


<script type="text/javascript">
$('.msg_error').html('');
function hitung(name)
{
  var v1 = $('[name="'+name+'1"]').val();
  var v2 = $('[name="'+name+'2"]').val();
  var v3 = $('[name="'+name+'3"]').val();
  var v4 = $('[name="'+name+'4"]').val();
  var v5 = $('[name="'+name+'5"]').val();


  if (v1 == '') {v1 = 0;}
  if (v2 == '') {v2 = 0;}
  if (v3 == '') {v3 = 0;}
  if (v4 == '') {v4 = 0;}
  if (v5 == '') {v5 = 0;}

  jml = parseInt(v1)+parseInt(v2)+parseInt(v3)+parseInt(v4)+parseInt(v5);
  rata_rata = jml / 5;
  $('#nilai_'+name).text(rata_rata);
  $('[name="nilai_'+name+'"]').val(rata_rata);

  jml_nilai = parseInt($('#nilai_ipa').text())+parseInt($('#nilai_mtk').text())+parseInt($('#nilai_ind').text())+parseInt($('#nilai_ing').text());
  total_nilai =  jml_nilai / parseInt(4);
  jml_nilai_fix   = jml_nilai.toFixed(2);
  total_nilai_fix = total_nilai.toFixed(2);
  $('#total_nilai').text(total_nilai);
  $('[name="total_nilai"]').val(total_nilai);

}

</script>
