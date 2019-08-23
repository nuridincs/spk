<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Nilai Pegawai</h3>

  <form id="form-tambah-nilai-pegawai" method="POST">
    <label for="">Pilih Karyawan</label>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <!-- <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2"> -->
      <select class="form-control" name="id_karyawan">
        <?php
        foreach ($dataKaryawan as $karyawan) {
          ?>
          <option value="<?php echo $karyawan->id; ?>">
            <?php echo $karyawan->nama; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <label for="">Pilih C1</label>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <select class="form-control" name="c1">
        <?php
        foreach ($dataC1 as $c1) {
          ?>
          <option value="<?php echo $c1->id; ?>">
            <?php echo $c1->pilihan_kriteria; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <label for="">Pilih C2</label>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <select name="c2" class="form-control">
        <?php
        foreach ($dataC2 as $c2) {
          ?>
          <option value="<?php echo $c2->id; ?>">
            <?php echo $c2->pilihan_kriteria; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <label for="">Pilih C3</label>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <select name="c3" class="form-control">
        <?php
        foreach ($dataC3 as $c3) {
          ?>
          <option value="<?php echo $c3->id; ?>">
            <?php echo $c3->pilihan_kriteria; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <label for="">Pilih C4</label>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <select name="c4" class="form-control">
        <?php
        foreach ($dataC4 as $c4) {
          ?>
          <option value="<?php echo $c4->id; ?>">
            <?php echo $c4->pilihan_kriteria; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <label for="">Pilih C5</label>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <select name="c5" class="form-control">
        <?php
        foreach ($dataC5 as $c5) {
          ?>
          <option value="<?php echo $c5->id; ?>">
            <?php echo $c5->pilihan_kriteria; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <label for="">Pilih C6</label>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <select name="c6" class="form-control">
        <?php
        foreach ($dataC6 as $c6) {
          ?>
          <option value="<?php echo $c6->id; ?>">
            <?php echo $c6->pilihan_kriteria; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <label for="">Pilih C7</label>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <select name="c7" class="form-control">
        <?php
        foreach ($dataC7 as $c7) {
          ?>
          <option value="<?php echo $c7->id; ?>">
            <?php echo $c7->pilihan_kriteria; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <label for="">Pilih C8</label>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <select name="c8" class="form-control">
        <?php
        foreach ($dataC8 as $c8) {
          ?>
          <option value="<?php echo $c8->id; ?>">
            <?php echo $c8->pilihan_kriteria; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
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