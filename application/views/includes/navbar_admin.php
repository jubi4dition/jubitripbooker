<div class="navbar navbar-static-top">
  <div class="navbar-inner">
  <div class="noisy">
    <div class="container">
      <a class="brand" href="<?=URL::to('admin'); ?>">JTB</a>
      <ul class="nav">
        <li class="divider-vertical"></li>
        <li id="nav-users"><a href="<?=URL::to('admin/users'); ?>"><i class="icon-user icon-white"></i> Users</a></li>
        <li class="divider-vertical"></li>
        <li id="nav-trips"><a href="<?=URL::to('admin/trips'); ?>"><i class="icon-briefcase icon-white"></i> Trips</a></li>
        <li class="divider-vertical"></li>
        <li id="nav-events"><a href="<?=URL::to('admin/events'); ?>"><i class="icon-time icon-white"></i> Events</a></li>
        <li class="divider-vertical"></li>
      </ul>
      <div class="pull-right">
        <small class="navbar-text">User: <?=HTML::link('admin/profile', Session::get('name')); ?></small>
        <a href="<?=URL::to('admin/logout') ?>" class="btn btn-primary"><i class="icon-road icon-white"></i> Logout</a>
      </div>
    </div>
  </div>
  </div>
</div>
