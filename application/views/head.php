<div class="navbar navbar-default navbar-fixed-top header-highlight">
  <div class="navbar-header">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><b style="color:white;font-size:17px;"><i>Entry</i></b></a>
    <ul class="nav navbar-nav visible-xs-block">
      <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
      <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
    </ul>
  </div>

  <div class="navbar-collapse collapse" id="navbar-mobile">
    <ul class="nav navbar-nav">
      <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown dropdown-user">
        <a class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo base_url(); ?>" alt="">
          <span><i class='icon-user'></i><?php echo getnama($this->session->userdata('id')); ?></span>
          <i class="caret"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="<?php echo site_url('entry/user/Ubah_Password/').$this->session->userdata('id'); ?>"><i class="icon-cog5"></i> Ubah Username Dan Password</a></li>
          <li><a href="<?php echo site_url('entry/dasboard/logout'); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Keluar');"><i class="icon-switch2"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>