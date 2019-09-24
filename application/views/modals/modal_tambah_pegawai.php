<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Pegawai</h3>

  <form id="form-tambah-pegawai" method="POST">
    <div class="form-group">
      <label for="">Nama</label>
      <input type="text" class="form-control" placeholder="Nama" name="nama">
    </div>

    <div class="form-group">
      <label for="">Nik</label>
      <input type="text" class="form-control" placeholder="Nik" name="nik">
    </div>

    <div class="form-group">
      <label for="">Departemen</label>
      <select name="posisi" class="form-control select2" style="width: 100%">
        <?php
        foreach ($dataPosisi as $posisi) {
          ?>
          <option value="<?php echo $posisi->id; ?>">
            <?php echo $posisi->nama; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    
    <div class="form-group">
      <label for="">Jabatan</label>
      <input type="text" class="form-control" placeholder="Jabatan" name="jabatan">
    </div>

    <div class="form-group">
      <label for="">Level</label>
      <select name="level" class="form-control" style="width: 100%">
        <?php
        for($lvl = 1; $lvl <= 4; $lvl++) {
          ?>
          <option value="<?php echo $lvl; ?>">
            <?php echo $lvl; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    
    <div class="form-group">
      <label for="">DOJ</label>
      <input type="text" class="form-control" placeholder="DOJ" name="doj" value="<?php echo date('d F Y') ?>">
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