<div class="sidebar sidebar-main">
  <div class="sidebar-content">
    <div class="sidebar-user">
    </div>
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">
          <li class="<?php echo menuaktif('dasboard',$aktif); ?>"><a href="<?php echo base_url(); ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
          <li>
            <a href="#"><i class="icon-stack2"></i> <span>Master Data</span></a>
            <ul>
              <li class="<?php echo menuaktif('MasterData',$aktif); ?>"><a href="<?php echo site_url('entry/masterdata'); ?>"><i class="icon-sphere"></i>Master Data</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class="icon-upload7"></i> <span>Transaksi</span></a>
            <ul>
              <li class="<?php echo menuaktif('HarianData',$aktif); ?>"><a href="<?php echo site_url('Entry/hariandata'); ?>"><i class="icon-pencil7"></i> <span>Harian</span></a></li>
            </ul>
          </li>
          <li class="<?php echo menuaktif('laporan',$aktif); ?>"><a href="<?php echo site_url('entry/Laporan'); ?>"><i class="icon-book"></i> <span>Lihat Laporan</span></a></li>
          <li class="<?php echo menuaktif('Cetak',$aktif); ?>"><a href="<?php echo site_url('entry/Laporan/Cetak1'); ?>"><i class="icon-download"></i> <span>Cetak Laporan</span></a></li>
          <li class="<?php echo menuaktif('User',$aktif); ?>"><a href="<?php echo site_url('entry/User'); ?>"><i class="icon-collaboration"></i> <span>Manajemen Akses</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>