<div class="navbar navbar-static-top">
  <div class="navbar-inner">
  <div class="noisy">
    <div class="container">
      <a class="brand" href="<?=URL::to('user'); ?>">JTB</a>
      <ul class="nav">
        <li class="divider-vertical"></li>
        <li id="nav-book"><a href="<?=URL::to('user/book'); ?>"><i class="icon-globe"></i> Book</a></li>
        <li class="divider-vertical"></li>
        <li id="nav-booked"><a href="<?=URL::to('user/booked'); ?>"><i class="icon-briefcase"></i> Booked</a></li>
        <li class="divider-vertical"></li>
      </ul>
      <div class="pull-right">
        <small class="navbar-text">User: <?=HTML::link('user/profile', Session::get('name')); ?></small>
        <a href="<?=URL::to('login/logout') ?>" class="btn btn-primary"><i class="icon-road icon-white"></i> Logout</a>
      </div>
    </div>
  </div>
  </div>
</div>
