<?php
  foreach ($dataPegawai as $pegawai) {
    ?>
    <tr>
      <td><?php echo $pegawai->nik; ?></td>
      <td><?php echo $pegawai->nama; ?></td>
      <td><?php echo $pegawai->nama_jabatan; ?></td>
      <td><?php echo $pegawai->departemen; ?></td>
      <td><?php echo $pegawai->k_doj; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataPegawai" data-id="<?php echo $pegawai->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-pegawai" data-id="<?php echo $pegawai->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>