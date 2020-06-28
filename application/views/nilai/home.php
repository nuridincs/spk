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
            <td><?php echo $pegawai->nama_jabatan; ?></td>
            <td><?php echo $pegawai->departemen; ?></td>
            <td><?php echo $pegawai->k_doj; ?></td>
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
      <h4>Data Nilai Karyawan</h4>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nik</th>
          <th>Nama</th>
          <th>Masa Kerja</th>
          <th>Absensi</th>
          <th>Target Penjualan</th>
          <th>Status Kepegawaian</th>
          <th>Pendidikan</th>
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
      <h4>Range</h4>
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
        </tr>
      </thead>
      <tbody id="data-nilai-pegawai">
        <?php
          foreach ($dataNilaiRangeKaryawan as $dataNilaiRange) {
            ?>
            <tr>
              <td><?php echo $dataNilaiRange->nik; ?></td>
              <td><?php echo $dataNilaiRange->nama; ?></td>
              <td><?php echo $dataNilaiRange->c1; ?></td>
              <td><?php echo $dataNilaiRange->c2; ?></td>
              <td><?php echo $dataNilaiRange->c3; ?></td>
              <td><?php echo $dataNilaiRange->c4; ?></td>
              <td><?php echo $dataNilaiRange->c5; ?></td>
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
          <th>Nik</th>
          <th>Nama</th>
          <th>C1</th>
          <th>C2</th>
          <th>C3</th>
          <th>C4</th>
          <th>C5</th>
        </tr>
      </thead>
      <tbody id="data-nilai-pegawai">
        <?php
          $maxC1 = [];
          $maxC2 = [];
          $maxC3 = [];
          $maxC4 = [];
          $maxC5 = [];

          foreach ($dataNilaiRangeKaryawan as $dataNilai) {
            $maxC1[] = $dataNilai->bobot_c1;
            $maxC2[] = $dataNilai->bobot_c2;
            $maxC3[] = $dataNilai->bobot_c3;
            $maxC4[] = $dataNilai->bobot_c4;
            $maxC5[] = $dataNilai->bobot_c5;
            ?>
            <tr>
              <td><?php echo $dataNilai->nik; ?></td>
              <td><?php echo $dataNilai->nama; ?></td>
              <td><?php echo $dataNilai->bobot_c1; ?></td>
              <td><?php echo $dataNilai->bobot_c2; ?></td>
              <td><?php echo $dataNilai->bobot_c3; ?></td>
              <td><?php echo $dataNilai->bobot_c4; ?></td>
              <td><?php echo $dataNilai->bobot_c5; ?></td>
            </tr>
            <?php
          }
        ?>
        <tr>
          <td colspan="2" align="center"><b>Jumlah</b></td>
          <td><?php echo min($maxC1); ?></td>
          <td><?php echo max($maxC2); ?></td>
          <td><?php echo max($maxC3); ?></td>
          <td><?php echo max($maxC4); ?></td>
          <td><?php echo max($maxC5); ?></td>
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
        </tr>
      </thead>
      <tbody id="data-nilai-pegawai">
        <?php
          foreach ($dataNilaiRangeKaryawan as $dataNilai) {
            $normalisasiC1 = $dataNilai->bobot_c1 / max($maxC1);
            $normalisasiC2 = $dataNilai->bobot_c2 / max($maxC2);
            $normalisasiC3 = $dataNilai->bobot_c3 / max($maxC3);
            $normalisasiC4 = $dataNilai->bobot_c4 / max($maxC4);
            $normalisasiC5 = $dataNilai->bobot_c5 / max($maxC5);
            ?>
            <tr>
              <td><?php echo $dataNilai->nama; ?></td>
              <td><?php echo number_format($normalisasiC1,2); ?></td>
              <td><?php echo number_format($normalisasiC2,2); ?></td>
              <td><?php echo number_format($normalisasiC3,2); ?></td>
              <td><?php echo number_format($normalisasiC4,2); ?></td>
              <td><?php echo number_format($normalisasiC5,2); ?></td>
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
        </tr>
      </thead>
      <tbody id="data-nilai-pegawai">
        <?php
          $bobotC1 = 0.15;
          $bobotC2 = 0.25;
          $bobotC3 = 0.20;
          $bobotC4 = 0.20;
          $bobotC5 = 0.20;
          foreach ($dataNilaiRangeKaryawan as $dataNilai) {
            $hitungRankingC1 = ($dataNilai->bobot_c1 / max($maxC1)) * $bobotC1;
            $hitungRankingC2 = ($dataNilai->bobot_c2 / max($maxC2)) * $bobotC2;
            $hitungRankingC3 = ($dataNilai->bobot_c3 / max($maxC3)) * $bobotC3;
            $hitungRankingC4 = ($dataNilai->bobot_c4 / max($maxC4)) * $bobotC4;
            $hitungRankingC5 = ($dataNilai->bobot_c5 / max($maxC5)) * $bobotC5;
            ?>
            <tr>
              <td><?php echo $dataNilai->nama; ?></td>
              <td><?php echo number_format($hitungRankingC1,2); ?></td>
              <td><?php echo number_format($hitungRankingC2,2); ?></td>
              <td><?php echo number_format($hitungRankingC3,2); ?></td>
              <td><?php echo number_format($hitungRankingC4,2); ?></td>
              <td><?php echo number_format($hitungRankingC5,2); ?></td>
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
              $bobotC2 = 0.25;
              $bobotC3 = 0.20;
              $bobotC4 = 0.20;
              $bobotC5 = 0.20;
              $resultkalkulasiRangking = [];
              foreach ($dataNilaiRangeKaryawan as $dataNilai) {
                $hitungRankingC1 = ($dataNilai->bobot_c1 / max($maxC1)) * $bobotC1;
                $hitungRankingC2 = ($dataNilai->bobot_c2 / max($maxC2)) * $bobotC2;
                $hitungRankingC3 = ($dataNilai->bobot_c3 / max($maxC3)) * $bobotC3;
                $hitungRankingC4 = ($dataNilai->bobot_c4 / max($maxC4)) * $bobotC4;
                $hitungRankingC5 = ($dataNilai->bobot_c5 / max($maxC5)) * $bobotC5;

                $kalkulasiRangking = $hitungRankingC1 + $hitungRankingC2  + $hitungRankingC3  + $hitungRankingC4  + $hitungRankingC5;
                $resultkalkulasiRangking[] = $hitungRankingC1 + $hitungRankingC2  + $hitungRankingC3  + $hitungRankingC4  + $hitungRankingC5;
                ?>
                <tr>
                  <td><?php echo $dataNilai->nama; ?></td>
                  <td><?php echo number_format(round($kalkulasiRangking,2),2); ?></td>
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