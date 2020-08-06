<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Pegawai</h3>
      <form method="POST" id="form-update-pegawai">
        <input type="hidden" name="id" value="<?php echo $dataPegawai->id; ?>">

        <div class="form-group">
          <label for="">Nama</label>
          <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->nama; ?>">
        </div>

        <div class="form-group">
          <label for="">Nik</label>
          <input type="text" class="form-control" placeholder="Nik" name="nik" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->nik; ?>">
        </div>

        <div class="form-group">
          <label for="">Departemen</label>
          <select name="posisi" class="form-control select2" style="width: 100%">
            <?php
            foreach ($dataPosisi as $posisi) {
              ?>
              <option value="<?php echo $posisi->id; ?>" <?php if($posisi->id == $dataPegawai->id_posisi){echo "selected='selected'";} ?>><?php echo $posisi->nama; ?></option>
              <?php
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Jabatan</label>
          <!-- <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" value="<?php //echo $dataPegawai->jabatan; ?>"> -->
          <select name="jabatan" class="form-control select2" style="width: 100%">
          <?php
          foreach ($dataJabatan as $jabatan) {
            if ($dataPegawai->jabatan === $jabatan->id) {
          ?>
            <option value="<?php echo $jabatan->id; ?>" selected>
              <?php echo $jabatan->nama_jabatan; ?>
            </option>
          <?php
            } else {
            ?>
            <option value="<?php echo $jabatan->id; ?>">
              <?php echo $jabatan->nama_jabatan; ?>
            </option>
            <?php
          }
          }
          ?>
        </select>

        <div class="form-group">
          <label for="">Tanggal Periode</label>
          <input type="text" class="form-control" placeholder="Tanggal Periode" id="datepicker2" value="<?php echo $dataPegawai->tgl_periode; ?>" name="tgl_periode" required>
        </div>

        <div class="form-group">
          <label for="">Target Penjualan</label>
          <div class="input-group date">
            <input type="number" class="form-control" placeholder="Target Penjualan" name="target_penjualan" value="<?php echo $dataPegawai->target_penjualan; ?>" required>

            <div class="input-group-addon">
              %
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('#datepicker2').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight:'TRUE',
      autoclose: true,
    });

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>