<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"> <?php echo !empty($type) ? ucwords($type) : "Tambah" ?> Data Nilai Pegawai</h3>
  
  <form id="form-tambah-nilai-pegawai" method="POST">
    <input type="hidden" value="<?php echo !empty($type) ? $type : "" ?>" name="type">

    <div class="form-group">
      <label for="">Pilih Karyawan</label>
      <select class="form-control" name="id_karyawan" required style="width: 100%">
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
    
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Masa Kerja</label>
          <input type="text" name="nc1" placeholder="Masukan Nilai Masa Kerja" class="form-control" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Pilih C1</label>
          <select class="form-control" name="c1" required>
          <?php
          foreach ($kriteria['dataC1'] as $c1) {
            if (!empty($dataNilaiPegawai)) {
              if ($c1->pilihan_kriteria === $dataNilaiPegawai[0]->c1) {
                echo '<option value="'.$c1->id.'" selected>'.$c1->pilihan_kriteria.'</option>';
              } else {
                echo '<option value="'.$c1->id.'">'.$c1->pilihan_kriteria.'</option>';           
              }
            } else {
              echo '<option value="'.$c1->id.'">'.$c1->pilihan_kriteria.'</option>';           
            }
            ?>
            <?php
          }
          ?>
        </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Disiplin</label>
          <input type="text" name="nc2" placeholder="Masukan Nilai Disiplin" class="form-control" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Pilih C2</label>
        <select class="form-control" name="c2" style="width: 100%" required>
          <?php
          foreach ($kriteria['dataC2'] as $c2) {
            if (!empty($dataNilaiPegawai)) {
              if ($c2->pilihan_kriteria === $dataNilaiPegawai[0]->c2) {
                echo '<option value="'.$c2->id.'" selected>'.$c2->pilihan_kriteria.'</option>';
              } else {
                echo '<option value="'.$c2->id.'">'.$c2->pilihan_kriteria.'</option>';           
              }
            } else {
              echo '<option value="'.$c2->id.'">'.$c2->pilihan_kriteria.'</option>';           
            }
            ?>
            <?php
          }
          ?>
        </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Prestasi Kerja</label>
          <input type="text" name="nc3" placeholder="Masukan Nilai Prestasi Kerja" class="form-control" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Pilih C3</label>
          <select class="form-control" name="c3" required>
          <?php
          foreach ($kriteria['dataC3'] as $c3) {
            if (!empty($dataNilaiPegawai)) {
              if ($c3->pilihan_kriteria === $dataNilaiPegawai[0]->c3) {
                echo '<option value="'.$c3->id.'" selected>'.$c3->pilihan_kriteria.'</option>';
              } else {
                echo '<option value="'.$c3->id.'">'.$c3->pilihan_kriteria.'</option>';           
              }
            } else {
              echo '<option value="'.$c3->id.'">'.$c3->pilihan_kriteria.'</option>';           
            }
            ?>
            <?php
          }
          ?>
        </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Kerja Sama</label>
          <input type="text" name="nc4" placeholder="Masukan Nilai Kerja Sama" class="form-control" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Pilih C4</label>
          <select class="form-control" name="c4" required>
          <?php
          foreach ($kriteria['dataC4'] as $c4) {
            if (!empty($dataNilaiPegawai)) {
              if ($c4->pilihan_kriteria === $dataNilaiPegawai[0]->c4) {
                echo '<option value="'.$c4->id.'" selected>'.$c4->pilihan_kriteria.'</option>';
              } else {
                echo '<option value="'.$c4->id.'">'.$c4->pilihan_kriteria.'</option>';           
              }
            } else {
              echo '<option value="'.$c4->id.'">'.$c4->pilihan_kriteria.'</option>';           
            }
            ?>
            <?php
          }
          ?>
        </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Kecakapan</label>
          <input type="text" name="nc5" placeholder="Masukan Nilai Kecakapan" class="form-control" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Pilih C5</label>
          <select class="form-control" name="c5" required>
          <?php
          foreach ($kriteria['dataC5'] as $c5) {
            if (!empty($dataNilaiPegawai)) {
              if ($c5->pilihan_kriteria === $dataNilaiPegawai[0]->c5) {
                echo '<option value="'.$c5->id.'" selected>'.$c5->pilihan_kriteria.'</option>';
              } else {
                echo '<option value="'.$c5->id.'">'.$c5->pilihan_kriteria.'</option>';           
              }
            } else {
              echo '<option value="'.$c5->id.'">'.$c5->pilihan_kriteria.'</option>';           
            }
            ?>
            <?php
          }
          ?>
        </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Loyalitas</label>
          <input type="text" name="nc6" placeholder="Masukan Nilai Loyalitas" class="form-control" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Pilih C6</label>
          <select class="form-control" name="c6" required>
          <?php
          foreach ($kriteria['dataC6'] as $c6) {
            if (!empty($dataNilaiPegawai)) {
              if ($c6->pilihan_kriteria === $dataNilaiPegawai[0]->c6) {
                echo '<option value="'.$c6->id.'" selected>'.$c6->pilihan_kriteria.'</option>';
              } else {
                echo '<option value="'.$c6->id.'">'.$c6->pilihan_kriteria.'</option>';           
              }
            } else {
              echo '<option value="'.$c6->id.'">'.$c6->pilihan_kriteria.'</option>';           
            }
            ?>
            <?php
          }
          ?>
        </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Kepemimpinan</label>
          <input type="text" name="nc7" placeholder="Masukan Nilai Kepemimpinan" class="form-control" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Pilih C7</label>
          <select class="form-control" name="c7">
          <?php
          foreach ($kriteria['dataC7'] as $c7) {
            if (!empty($dataNilaiPegawai)) {
              if ($c7->pilihan_kriteria === $dataNilaiPegawai[0]->c7) {
                echo '<option value="'.$c7->id.'" selected>'.$c7->pilihan_kriteria.'</option>';
              } else {
                echo '<option value="'.$c7->id.'">'.$c7->pilihan_kriteria.'</option>';           
              }
            } else {
              echo '<option value="'.$c7->id.'">'.$c7->pilihan_kriteria.'</option>';           
            }
            ?>
            <?php
          }
          ?>
        </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Pendidikan</label>
          <input type="text" name="nc8" placeholder="Masukan Nilai Pendidikan" class="form-control" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Pilih C8</label>
          <select class="form-control" name="c8" required>
          <?php
          foreach ($kriteria['dataC8'] as $c8) {
            if (!empty($dataNilaiPegawai)) {
              if ($c8->pilihan_kriteria === $dataNilaiPegawai[0]->c8) {
                echo '<option value="'.$c8->id.'" selected>'.$c8->pilihan_kriteria.'</option>';
              } else {
                echo '<option value="'.$c8->id.'">'.$c8->pilihan_kriteria.'</option>';           
              }
            } else {
              echo '<option value="'.$c8->id.'">'.$c8->pilihan_kriteria.'</option>';           
            }
            ?>
            <?php
          }
          ?>
        </select>
        </div>
      </div>
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