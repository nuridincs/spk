<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"> <?php echo !empty($type) ? ucwords($type) : "Tambah" ?> Data Nilai Pegawai</h3>
  
  <form id="form-tambah-nilai-pegawai" method="POST">
    <input type="hidden" value="<?php echo !empty($type) ? $type : "" ?>" name="type">

    <div class="form-group">
      <label for="">Pilih Karyawan</label>
      <select class="form-control" name="id_karyawan" style="width: 100%">
        <?php
        foreach ($dataKaryawan as $karyawan) {
          if (!empty($dataNilaiPegawai)) {
            if ($karyawan->id === $dataNilaiPegawai[0]->id_karyawan) {
              echo '<option value="'.$karyawan->id.'" selected>'.$karyawan->nama.'</option>';
            } else {
              echo '<option value="'.$karyawan->id.'">'.$karyawan->nama.'</option>';           
            }
          } else {
            echo '<option value="'.$karyawan->id.'">'.$karyawan->nama.'</option>';           
          }
          ?>
          <?php
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="">Pilih C1</label>
      <input type="text" name="c1" placeholder="Masukan C1" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Pilih C2</label>
      <input type="text" name="c2" placeholder="Masukan C2" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Pilih C3</label>
      <input type="text" name="c3" placeholder="Masukan C3" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Pilih C4</label>
      <input type="text" name="c4" placeholder="Masukan C4" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Pilih C5</label>
      <input type="text" name="c5" placeholder="Masukan C5" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Pilih C6</label>
      <input type="text" name="c6" placeholder="Masukan C6" class="form-control">
    </div>

    <div class=" form-group">
      <label for="">Pilih C7</label>
      <input type="text" name="c7" placeholder="Masukan C7" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Pilih C8</label>      
      <input type="text" name="c8" placeholder="Masukan C8" class="form-control">
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary" id="actionSubmitNilaiPegawai"> <i class="glyphicon glyphicon-ok"></i> <?php echo !empty($type) ? ucwords($type) : "Tambah" ?> Data</button>
      </div>
    </div>
  </form>
</div>


<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>