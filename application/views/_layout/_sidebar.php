<aside class="main-sidebar main-bg">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar main-bg">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <!-- <li class="header">LIST MENU</li> -->
      <!-- Optionally, you can add icons to the links -->

      <?php 
        if (!empty($userdata->role) && $userdata->role == 'admin') {
      ?>
        <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Home'); ?>">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a>
        </li>

        <li <?php if ($page == 'kriteria') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Kriteria'); ?>">
            <i class="fa fa-list"></i>
            <span>Kriteria</span>
          </a>
        </li>
        
        <li <?php if ($page == 'pegawai') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Pegawai'); ?>">
            <i class="fa fa-user"></i>
            <span>Data Karyawan</span>
          </a>
        </li>

        <li <?php if ($page == 'nilai') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Nilai'); ?>">
            <i class="fa fa-list"></i>
            <span>Nilai</span>
          </a>
        </li>

        <li <?php if ($page == 'laporanPenilaian') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Nilai/laporanPenilaian'); ?>">
            <i class="fa fa-book"></i>
            <span>Laporan Penilaian</span>
          </a>
        </li>
      <?php
        } else if (!empty($userdata->role) && $userdata->role == 'supervisor') { 
      ?>
        <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Home'); ?>">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a>
        </li>

        <li <?php if ($page == 'nilai') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Nilai'); ?>">
            <i class="fa fa-file"></i>
            <span>Nilai</span>
          </a>
        </li>

        <li <?php if ($page == 'laporanPenilaian') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Nilai/laporanPenilaian'); ?>">
            <i class="fa fa-book"></i>
            <span>Laporan Penilaian</span>
          </a>
        </li>
      <?php
        } else {
      ?>
        <li <?php if ($page == 'laporanPenilaian') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Nilai/laporanPenilaian'); ?>">
            <i class="fa fa-file"></i>
            <span>Laporan Penilaian</span>
          </a>
        </li>
        <li <?php if ($page == 'nilai') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Nilai/karyawan'); ?>">
            <i class="fa fa-file"></i>
            <span>Nilai</span>
          </a>
        </li>
      <?php
        }
      ?>

      <!-- <li <?php // if ($page == 'posisi') {echo 'class="active"';} ?>>
        <a href="<?php // echo base_url('Posisi'); ?>">
          <i class="fa fa-briefcase"></i>
          <span>Data Posisi</span>
        </a>
      </li>
      
      <li <?php // if ($page == 'kota') {echo 'class="active"';} ?>>
        <a href="<?php // echo base_url('Kota'); ?>">
          <i class="fa fa-location-arrow"></i>
          <span>Data Kota</span>
        </a>
      </li> -->
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>