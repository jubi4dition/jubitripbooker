<div class="navbar navbar-static-top">
  <div class="navbar-inner">
  <div class="noisy">
    <div class="container">
      <a class="brand" href="<?=URL::to('admin'); ?>">JTB</a>
      <ul class="nav">
        <li class="divider-vertical"></li>
        <li id="nav-book"><a href="<?=URL::to('admin/users'); ?>"><i class="icon-globe icon-white"></i> Users</a></li>
        <li class="divider-vertical"></li>
        <li id="nav-booked"><a href="<?=URL::to('admin/trips'); ?>"><i class="icon-briefcase icon-white"></i> Trips</a></li>
        <li class="divider-vertical"></li>
        <li id="nav-booked"><a href="<?=URL::to('admin/locations'); ?>"><i class="icon-briefcase icon-white"></i> Locations</a></li>
        <li class="divider-vertical"></li>
      </ul>
      <div class="pull-right">
        <small class="navbar-text">User: Admin</small>
        <a href="<?=URL::to('admin/logout') ?>" class="btn btn-primary"><i class="icon-road icon-white"></i> Logout</a>
      </div>
    </div>
  </div>
  </div>
</div>
