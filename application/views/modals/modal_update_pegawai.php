<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Pegawai</h3>
      <form method="POST" id="form-update-pegawai">
        <?php print_r($dataPegawai); ?>
        <input type="text" name="id" value="<?php echo $dataPegawai->id; ?>">

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
        </div>

        <div class="form-group">
          <label for="">Level</label>
          <select name="level" class="form-control" style="width: 100%">
            <?php
            for($lvl = 1; $lvl <= 4; $lvl++) {
              ?>
              <option value="<?php echo $lvl; ?>" <?php if($lvl == $dataPegawai->level){ echo "selected='selected'";} ?>>
                <?php echo $lvl; ?>
              </option>
              <?php
            }
            ?>
          </select>
        </div>
        
        <div class="form-group">
          <label for="">DOJ</label>
          <input type="text" class="form-control" placeholder="DOJ" name="doj" value="<?php echo $dataPegawai->doj; ?>">
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

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>