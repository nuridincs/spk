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
  }

  $bobotC1 = 0.15;
  $bobotC2 = 0.10;
  $bobotC3 = 0.15;
  $bobotC4 = 0.10;
  $bobotC5 = 0.10;
  $bobotC6 = 0.10;
  $bobotC7 = 0.2;
  $bobotC8 = 0.10;
  $resultkalkulasiRangking = [];
  $nilaiGroup = [];
  foreach ($dataNilaiKaryawan as $dataNilai) {
    $hitungRankingC1 = ($dataNilai->bobot_c1 / max($maxC1)) * $bobotC1;
    $hitungRankingC2 = ($dataNilai->bobot_c2 / max($maxC2)) * $bobotC2;
    $hitungRankingC3 = ($dataNilai->bobot_c3 / max($maxC3)) * $bobotC3;
    $hitungRankingC4 = ($dataNilai->bobot_c4 / max($maxC4)) * $bobotC4;
    $hitungRankingC5 = ($dataNilai->bobot_c5 / max($maxC5)) * $bobotC5;
    $hitungRankingC6 = ($dataNilai->bobot_c6 / max($maxC6)) * $bobotC6;
    $hitungRankingC7 = ($dataNilai->bobot_c7 / max($maxC7)) * $bobotC7;
    $hitungRankingC8 = ($dataNilai->bobot_c8 / max($maxC8)) * $bobotC8;

    $kalkulasiRangking = $hitungRankingC1 + $hitungRankingC1  + $hitungRankingC2  + $hitungRankingC3  + $hitungRankingC4  + $hitungRankingC5  + $hitungRankingC7  + $hitungRankingC8;
    $resultkalkulasiRangking[] = $hitungRankingC1 + $hitungRankingC1  + $hitungRankingC2  + $hitungRankingC3  + $hitungRankingC4  + $hitungRankingC5  + $hitungRankingC7  + $hitungRankingC8;
    
    $nilaiGroup[] = array(
      'id' => $dataNilai->id_karyawan,
      'nama' => $dataNilai->nama,
      'nilai' => number_format($kalkulasiRangking,3)
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