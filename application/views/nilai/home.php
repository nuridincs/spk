<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <!-- /.box-header -->
  <div class="box-body">
    <div>
      <h4>Data Karyawan</h4>
    </div>
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nik</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Departemen</th>
          <th>Doj</th>
        </tr>
      </thead>
      <tbody id="data-nilai">
      <?php
        foreach ($dataPegawai as $pegawai) {
          ?>
          <tr>
            <td><?php echo $pegawai->nik; ?></td>
            <td><?php echo $pegawai->nama; ?></td>
            <td><?php echo $pegawai->jabatan; ?></td>
            <td><?php echo $pegawai->departemen; ?></td>
            <td><?php echo $pegawai->doj; ?></td>
          </tr>
          <?php
        }
      ?>
      </tbody>
    </table>
  </div>
</div>

<div class="box">
  <div class="box-body">
    <div>
      <h4>Data Penilaian Karyawan</h4>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>C1</th>
          <th>C2</th>
          <th>C3</th>
          <th>C4</th>
          <th>C5</th>
          <th>C6</th>
          <th>C7</th>
          <th>C8</th>
        </tr>
      </thead>
      <tbody id="data-nilai-pegawai">
        <?php
          foreach ($dataNilaiKaryawan as $dataNilai) {
            ?>
            <tr>
              <td><?php echo $dataNilai->nama; ?></td>
              <td><?php echo $dataNilai->c1; ?></td>
              <td><?php echo $dataNilai->c2; ?></td>
              <td><?php echo $dataNilai->c3; ?></td>
              <td><?php echo $dataNilai->c4; ?></td>
              <td><?php echo $dataNilai->c5; ?></td>
              <td><?php echo $dataNilai->c6; ?></td>
              <td><?php echo $dataNilai->c7; ?></td>
              <td><?php echo $dataNilai->c8; ?></td>
            </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<div class="box">
  <div class="box-body">
    <div>
      <h4>Data Rating Kecocokan</h4>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>C1</th>
          <th>C2</th>
          <th>C3</th>
          <th>C4</th>
          <th>C5</th>
          <th>C6</th>
          <th>C7</th>
          <th>C8</th>
        </tr>
      </thead>
      <tbody id="data-nilai-pegawai">
        <?php
          $maxC1 = [];
          $maxC2 = [];
          $maxC3 = [];
          $maxC4 = [];
          $maxC5 = [];
          $maxC6 = [];
          $maxC7 = [];
          $maxC8 = [];

          foreach ($dataNilaiKaryawan as $dataNilai) {
            $maxC1[] = $dataNilai->bobot_c1;
            $maxC2[] = $dataNilai->bobot_c2;
            $maxC3[] = $dataNilai->bobot_c3;
            $maxC4[] = $dataNilai->bobot_c4;
            $maxC5[] = $dataNilai->bobot_c5;
            $maxC6[] = $dataNilai->bobot_c6;
            $maxC7[] = $dataNilai->bobot_c7;
            $maxC8[] = $dataNilai->bobot_c8;
            ?>
            <tr>
              <td><?php echo $dataNilai->nama; ?></td>
              <td><?php echo $dataNilai->bobot_c1; ?></td>
              <td><?php echo $dataNilai->bobot_c2; ?></td>
              <td><?php echo $dataNilai->bobot_c3; ?></td>
              <td><?php echo $dataNilai->bobot_c4; ?></td>
              <td><?php echo $dataNilai->bobot_c5; ?></td>
              <td><?php echo $dataNilai->bobot_c6; ?></td>
              <td><?php echo $dataNilai->bobot_c7; ?></td>
              <td><?php echo $dataNilai->bobot_c8; ?></td>
            </tr>
            <?php
          }
        ?>
        <tr>
          <td>Jumlah</td>
          <td><?php echo max($maxC1); ?></td>
          <td><?php echo max($maxC2); ?></td>
          <td><?php echo max($maxC3); ?></td>
          <td><?php echo max($maxC4); ?></td>
          <td><?php echo max($maxC5); ?></td>
          <td><?php echo max($maxC6); ?></td>
          <td><?php echo max($maxC7); ?></td>
          <td><?php echo max($maxC8); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="box">
  <div class="box-body">
    <div>
      <h4>Hasil Perhitungan Normalisasi</h4>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>C1</th>
          <th>C2</th>
          <th>C3</th>
          <th>C4</th>
          <th>C5</th>
          <th>C6</th>
          <th>C7</th>
          <th>C8</th>
        </tr>
      </thead>
      <tbody id="data-nilai-pegawai">
        <?php
          foreach ($dataNilaiKaryawan as $dataNilai) {
            $normalisasiC1 = $dataNilai->bobot_c1 / max($maxC1);
            $normalisasiC2 = $dataNilai->bobot_c2 / max($maxC2);
            $normalisasiC3 = $dataNilai->bobot_c3 / max($maxC3);
            $normalisasiC4 = $dataNilai->bobot_c4 / max($maxC4);
            $normalisasiC5 = $dataNilai->bobot_c5 / max($maxC5);
            $normalisasiC6 = $dataNilai->bobot_c6 / max($maxC6);
            $normalisasiC7 = $dataNilai->bobot_c7 / max($maxC7);
            $normalisasiC8 = $dataNilai->bobot_c8 / max($maxC8);
            ?>
            <tr>
              <td><?php echo $dataNilai->nama; ?></td>
              <td><?php echo number_format($normalisasiC1,2); ?></td>
              <td><?php echo number_format($normalisasiC2,2); ?></td>
              <td><?php echo number_format($normalisasiC3,2); ?></td>
              <td><?php echo number_format($normalisasiC4,2); ?></td>
              <td><?php echo number_format($normalisasiC5,2); ?></td>
              <td><?php echo number_format($normalisasiC6,2); ?></td>
              <td><?php echo number_format($normalisasiC7,2); ?></td>
              <td><?php echo number_format($normalisasiC8,2); ?></td>
            </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>


<div class="box">
  <div class="box-body">
    <div>
      <h4>Perhitungan Ranking</h4>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>C1</th>
          <th>C2</th>
          <th>C3</th>
          <th>C4</th>
          <th>C5</th>
          <th>C6</th>
          <th>C7</th>
          <th>C8</th>
        </tr>
      </thead>
      <tbody id="data-nilai-pegawai">
        <?php
          $bobotC1 = 0.15;
          $bobotC2 = 0.10;
          $bobotC3 = 0.15;
          $bobotC4 = 0.10;
          $bobotC5 = 0.10;
          $bobotC6 = 0.10;
          $bobotC7 = 0.2;
          $bobotC8 = 0.10;
          foreach ($dataNilaiKaryawan as $dataNilai) {
            $hitungRankingC1 = ($dataNilai->bobot_c1 / max($maxC1)) * $bobotC1;
            $hitungRankingC2 = ($dataNilai->bobot_c2 / max($maxC2)) * $bobotC2;
            $hitungRankingC3 = ($dataNilai->bobot_c3 / max($maxC3)) * $bobotC3;
            $hitungRankingC4 = ($dataNilai->bobot_c4 / max($maxC4)) * $bobotC4;
            $hitungRankingC5 = ($dataNilai->bobot_c5 / max($maxC5)) * $bobotC5;
            $hitungRankingC6 = ($dataNilai->bobot_c6 / max($maxC6)) * $bobotC6;
            $hitungRankingC7 = ($dataNilai->bobot_c7 / max($maxC7)) * $bobotC7;
            $hitungRankingC8 = ($dataNilai->bobot_c8 / max($maxC8)) * $bobotC8;
            ?>
            <tr>
              <td><?php echo $dataNilai->nama; ?></td>
              <td><?php echo number_format($hitungRankingC1,2); ?></td>
              <td><?php echo number_format($hitungRankingC2,2); ?></td>
              <td><?php echo number_format($hitungRankingC3,2); ?></td>
              <td><?php echo number_format($hitungRankingC4,2); ?></td>
              <td><?php echo number_format($hitungRankingC5,2); ?></td>
              <td><?php echo number_format($hitungRankingC6,2); ?></td>
              <td><?php echo number_format($hitungRankingC7,2); ?></td>
              <td><?php echo number_format($hitungRankingC8,2); ?></td>
            </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-body">
        <div>
          <h4>Kalkulasi Ranking</h4>
        </div>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody id="data-nilai-pegawai">
            <?php
              $bobotC1 = 0.15;
              $bobotC2 = 0.10;
              $bobotC3 = 0.15;
              $bobotC4 = 0.10;
              $bobotC5 = 0.10;
              $bobotC6 = 0.10;
              $bobotC7 = 0.2;
              $bobotC8 = 0.10;
              $resultkalkulasiRangking = [];
              foreach ($dataNilaiKaryawan as $dataNilai) {
                $hitungRankingC1 = ($dataNilai->bobot_c1 / max($maxC1)) * $bobotC1;
                $hitungRankingC2 = ($dataNilai->bobot_c2 / max($maxC2)) * $bobotC2;
                $hitungRankingC3 = ($dataNilai->bobot_c3 / max($maxC3)) * $bobotC3;
                $hitungRankingC4 = ($dataNilai->bobot_c4 / max($maxC4)) * $bobotC4;
                $hitungRankingC5 = ($dataNilai->bobot_c5 / max($maxC5)) * $bobotC5;
                $hitungRankingC6 = ($dataNilai->bobot_c6 / max($maxC6)) * $bobotC6;
                $hitungRankingC7 = ($dataNilai->bobot_c7 / max($maxC7)) * $bobotC7;
                $hitungRankingC8 = ($dataNilai->bobot_c8 / max($maxC8)) * $bobotC8;

                $kalkulasiRangking = $hitungRankingC1 + $hitungRankingC2  + $hitungRankingC3  + $hitungRankingC4  + $hitungRankingC5 + $hitungRankingC6 + $hitungRankingC7 + $hitungRankingC8;
                $resultkalkulasiRangking[] = $hitungRankingC1 + $hitungRankingC2  + $hitungRankingC3  + $hitungRankingC4  + $hitungRankingC5 + $hitungRankingC6 + $hitungRankingC7  + $hitungRankingC8;
                ?>
                <tr>
                  <td><?php echo $dataNilai->nama; ?></td>
                  <td><?php echo number_format($kalkulasiRangking,3); ?></td>
                </tr>
                <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box">
      <div class="box-body">
        <div>
          <h4>Ranking</h4>
        </div>
        <div>
        <p>
          Ranking tertinggi adalah</p>
          <?php echo number_format(max($resultkalkulasiRangking), 2); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo $modal_tambah_pegawai; ?>
<?php echo $modal_tambah_nilai_pegawai; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPegawai', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Pegawai';
  $data['url'] = 'Pegawai/import';
  echo show_my_modal('modals/modal_import', 'import-pegawai', $data);
?>