<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-pegawai"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
  </div>
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nik</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Departemen</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-pegawai">

      </tbody>
    </table>
  </div>
</div>

<div class="box">
  <div class="box-body">
    <div>
      <h4>Data Nilai Karyawan</h4>
      <span align="right">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-nilai-pegawai"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
      </span>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nik</th>
          <th>Nama</th>
          <th>C1</th>
          <th>C2</th>
          <th>C3</th>
          <th>C4</th>
          <th>C5</th>
          <!-- <th>C6</th>
          <th>C7</th>
          <th>C8</th> -->
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-nilai-pegawai">
        <?php
          foreach ($dataNilaiKaryawan as $dataNilai) {
            ?>
            <tr>
              <td><?php echo $dataNilai->nik; ?></td>
              <td><?php echo $dataNilai->nama; ?></td>
              <td><?php echo $dataNilai->NC1; ?></td>
              <td><?php echo $dataNilai->NC2; ?></td>
              <td><?php echo $dataNilai->NC3; ?></td>
              <td><?php echo $dataNilai->NC4; ?></td>
              <td><?php echo $dataNilai->NC5; ?></td>
              <!-- <td><?php //echo $dataNilai->NC6; ?></td>
              <td><?php //echo $dataNilai->NC7; ?></td>
              <td><?php //echo $dataNilai->NC8; ?></td> -->
              <td class="text-center">
                <button class="btn btn-warning btn-sm update-dataNilaiKaryawan" data-id="<?php echo $dataNilai->id_karyawan; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger btn-sm delete-datanilaiKaryawan" data-id="<?php echo $dataNilai->id."~".$dataNilai->id_nilai; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
              </td>
            </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_pegawai; ?>
<?php echo $modal_tambah_nilai_pegawai; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPegawai', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php //show_my_confirm('konfirmasiHapus', 'hapus-dataPegawai', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>

<?php
  $data['judul'] = 'Pegawai';
  $data['url'] = 'Pegawai/import';
  echo show_my_modal('modals/modal_import', 'import-pegawai', $data);
?>