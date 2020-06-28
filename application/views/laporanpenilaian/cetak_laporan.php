<?php
  $maxC1 = [];
  $maxC2 = [];
  $maxC3 = [];
  $maxC4 = [];
  $maxC5 = [];

  foreach ($dataNilaiKaryawan as $dataNilai) {
    $maxC1[] = $dataNilai->bobot_c1;
    $maxC2[] = $dataNilai->bobot_c2;
    $maxC3[] = $dataNilai->bobot_c3;
    $maxC4[] = $dataNilai->bobot_c4;
    $maxC5[] = $dataNilai->bobot_c5;
  }

  $bobotC1 = 0.15;
  $bobotC2 = 0.25;
  $bobotC3 = 0.20;
  $bobotC4 = 0.20;
  $bobotC5 = 0.20;
  $resultkalkulasiRangking = [];
  $nilaiGroup = [];
  foreach ($dataNilaiKaryawan as $dataNilai) {
    $hitungRankingC1 = ($dataNilai->bobot_c1 / max($maxC1)) * $bobotC1;
    $hitungRankingC2 = ($dataNilai->bobot_c2 / max($maxC2)) * $bobotC2;
    $hitungRankingC3 = ($dataNilai->bobot_c3 / max($maxC3)) * $bobotC3;
    $hitungRankingC4 = ($dataNilai->bobot_c4 / max($maxC4)) * $bobotC4;
    $hitungRankingC5 = ($dataNilai->bobot_c5 / max($maxC5)) * $bobotC5;

    $kalkulasiRangking = $hitungRankingC1 + $hitungRankingC2  + $hitungRankingC3  + $hitungRankingC4  + $hitungRankingC5;
    $resultkalkulasiRangking[] = $hitungRankingC1 + $hitungRankingC2  + $hitungRankingC3  + $hitungRankingC4  + $hitungRankingC5;

    $nilaiGroup[] = array(
      'id' => $dataNilai->id_karyawan,
      'nama' => $dataNilai->nama,
      'nilai' => number_format(round($kalkulasiRangking, 2), 2)
    );
  }
?>

<div>
  <h1 align="center">Laporan Penilaian</h1>
  <table border=1 class="table table-bordered table-striped" width="100%">
    <thead>
      <tr>
        <th>Nik</th>
        <th>Nama</th>
        <th>Nilai</th>
        <th>Ranking</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $data = $nilaiGroup;
        $nilai = array();
        foreach ($data as $idx => $dataInd) {
          $nilai[$dataInd['nilai']] = $dataInd['nilai'];
        }

        rsort($nilai);

        foreach ($data as $idx => $dataInd) {
          $data[$idx]['rank'] = array_search($dataInd['nilai'], $nilai) + 1; 
        }

        foreach($data as $value) {
          $color = "";
            if ($value['rank'] == 1) {
              $color = "style='background-color: #3c8dbc; color: white; font-weight: bold;opacity: 0.5;'";
            }
          ?>
          <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['nama']; ?></td>
            <td><?php echo $value['nilai']; ?></td>
            <td <?php echo $color ?> ><?php echo $value['rank']; ?></td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
  <p>
    <h4>Kesimpulan</h4>
    "Rangking yang lolos adalah <b>Ranking1</b>"
  </p>
  <div style="text-align: center;line-height: 35px;">TTD</div>
  <table border=1 width="50%" align="center" cellpadding="10">
      <tr align="center">
        <td>HR</td>
        <td>GM</td>
      </tr>
      <tr>
        <td rowspan="4">&nbsp;&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;&nbsp;</td>
      </tr>
  </table>
</div>