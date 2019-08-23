<div class="row">
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget attachment-block clearfix">
      <h4>Kriteria Masa Kerja (C1)</h4>
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Pilihan Kriteria</th>
              <th>Bobot</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody id="data-kriteria">
          <?php
            foreach ($dataC1 as $c1) {
              ?>
              <tr>
                <td><?php echo $c1->pilihan_kriteria; ?></td>
                <td><?php echo $c1->bobot; ?></td>
                <td class="text-center">
                  <button class="btn btn-warning update-dataKriteria" data-id="<?php echo "kriteria_masa_kerja~".$c1->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                </td>
              </tr>
              <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget attachment-block clearfix">
      <h4>Kriteria Displin (C2)</h4>
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Pilihan Kriteria</th>
              <th>Bobot</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody id="data-kriteria">
          <?php
            foreach ($dataC2 as $c2) {
              ?>
              <tr>
                <td><?php echo $c2->pilihan_kriteria; ?></td>
                <td><?php echo $c2->bobot; ?></td>
                <td class="text-center">
                  <button class="btn btn-warning update-dataKriteria" data-id="<?php echo "kriteria_disiplin~".$c2->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                </td>
              </tr>
              <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<div class="row">
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget attachment-block clearfix">
      <h4>Kriteria Prestasi Kerja (C3)</h4>
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Pilihan Kriteria</th>
              <th>Bobot</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody id="data-kriteria">
          <?php
            foreach ($dataC3 as $c3) {
              ?>
              <tr>
                <td><?php echo $c3->pilihan_kriteria; ?></td>
                <td><?php echo $c3->bobot; ?></td>
                <td class="text-center">
                  <button class="btn btn-warning update-dataKriteria" data-id="<?php echo "kriteria_prestasi_kerja~".$c3->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                </td>
              </tr>
              <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget attachment-block clearfix">
      <h4>Kriteria Kerja Sama (C4)</h4>
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Pilihan Kriteria</th>
              <th>Bobot</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody id="data-kriteria">
          <?php
            foreach ($dataC4 as $c4) {
              ?>
              <tr>
                <td><?php echo $c4->pilihan_kriteria; ?></td>
                <td><?php echo $c4->bobot; ?></td>
                <td class="text-center">
                  <button class="btn btn-warning update-dataKriteria" data-id="<?php echo "kriteria_kerja_sama~".$c4->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                </td>
              </tr>
              <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<div class="row">
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget attachment-block clearfix">
      <h4>Kriteria Kecakapan (C5)</h4>
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Pilihan Kriteria</th>
              <th>Bobot</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody id="data-kriteria">
          <?php
            foreach ($dataC5 as $c5) {
              ?>
              <tr>
                <td><?php echo $c5->pilihan_kriteria; ?></td>
                <td><?php echo $c5->bobot; ?></td>
                <td class="text-center">
                  <button class="btn btn-warning update-dataKriteria" data-id="<?php echo "kriteria_kecakapan~".$c5->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                </td>
              </tr>
              <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget attachment-block clearfix">
      <h4>Kriteria Loyalitas (C6)</h4>
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Pilihan Kriteria</th>
              <th>Bobot</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody id="data-kriteria">
          <?php
            foreach ($dataC6 as $c6) {
              ?>
              <tr>
                <td><?php echo $c6->pilihan_kriteria; ?></td>
                <td><?php echo $c6->bobot; ?></td>
                <td class="text-center">
                  <button class="btn btn-warning update-dataKriteria" data-id="<?php echo "kriteria_loyalitas~".$c6->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                </td>
              </tr>
              <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<div class="row">
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget attachment-block clearfix">
      <h4>Kriteria Kepemimpinan (C7)</h4>
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Pilihan Kriteria</th>
              <th>Bobot</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody id="data-kriteria">
          <?php
            foreach ($dataC7 as $c7) {
              ?>
              <tr>
                <td><?php echo $c7->pilihan_kriteria; ?></td>
                <td><?php echo $c7->bobot; ?></td>
                <td class="text-center">
                  <button class="btn btn-warning update-dataKriteria" data-id="<?php echo "kriteria_kepemimpinan~".$c7->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                </td>
              </tr>
              <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget attachment-block clearfix">
      <h4>Kriteria Pendidikan (C8)</h4>
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Pilihan Kriteria</th>
              <th>Bobot</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody id="data-kriteria">
          <?php
            foreach ($dataC8 as $c8) {
              ?>
              <tr>
                <td><?php echo $c8->pilihan_kriteria; ?></td>
                <td><?php echo $c8->bobot; ?></td>
                <td class="text-center">
                  <button class="btn btn-warning update-dataKriteria" data-id="<?php echo "kriteria_pendidikan~".$c8->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                </td>
              </tr>
              <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<div id="tempat-modal"></div>