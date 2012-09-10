<?=render('includes.header'); ?>
<?=render('includes.navbar', array('active' => 'no')); ?>
<div class="container">
<div class="content" id="content" style="display:none">
	<div class="page-header">
		<h1>Welcome to your JTB-Account</h1>
	</div>
	<div class="row">
	<div class="span10">
		<div class="alert alert-info">
			<a href="<?=URL::to('user/book'); ?>" class="btn btn-info"><i class="icon-globe icon-white"></i> Book</a>
			<strong>You can book your trips here</strong>		
		</div>
		<div class="alert alert-info">
			<a href="<?=URL::to('user/booked'); ?>" class="btn btn-info"><i class="icon-briefcase icon-white"></i> Booked</a>
			<strong>And you can watch your booked trips here</strong>	
		</div>
	</div>
	</div>
	<div class="row">
	<div class="span10">
		<h3>The locations of your cruise</h3>
		<table class="table table-bordered">
		<thead>
			<tr style="background-color: #D9EDF7;">
				<th>Day</th>
				<th>Location</th>
			</tr>
		</thead>
		<tbody>
		<? foreach ($locations as $location): ?>
		<tr>
			<td><?=$location->day; ?></td>
			<td><?=$location->name; ?></td>
		</tr>
		<? endforeach; ?>
		</tbody>
	</table>
	</div>
	</div>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {

	$('#content').fadeIn(1000);
});
</script>
<?=render('includes.footer'); ?>
