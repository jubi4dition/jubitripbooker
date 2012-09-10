<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="<?=URL::to('user'); ?>"><img src="<?=URL::to_asset('img/jtb-logo.png'); ?>" width="90px"/></a>
			<ul class="nav">
				<li class="divider-vertical"></li>
				<li <? if ($active == "book") echo "class=\"active\"" ?>><a href="<?=URL::to('user/book'); ?>"><i class="icon-globe"></i> Book</a></li>
				<li class="divider-vertical"></li>
				<li <? if ($active == "booked") echo "class=\"active\"" ?>><a href="<?=URL::to('user/booked'); ?>"><i class="icon-briefcase"></i> Booked</a></li>
				<li class="divider-vertical"></li>
			</ul>
			<div class="pull-right">
				<small class="navbar-text">User: <?=HTML::link('user/profile', Session::get('name')); ?></small>
				<a href="<?=URL::to('login/logout') ?>" class="btn btn-primary"><i class="icon-road icon-white"></i> Logout</a>
			</div>
		</div>
	</div>
</div>
