<?=render('includes.header'); ?>
<?=render('includes.navbar', array('active' => 'booked')); ?>
<div class="container">
<div class="content" id="content" style="display:none">
	<div class="page-header">
		<h1>Your booked Trips</h1>
	</div>
	<div class="row">
	<div class="span10">
		<table class="table table-bordered">
		<thead>
			<tr style="background-color: #D9EDF7;">
				<th>Day</th>
				<th>Place</th>
				<th>Trip</th>
				<th>Cost</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<? foreach ($booked_trips as $booked_trip): ?>
		<tr>
			<td><?=$booked_trip->day; ?></td>
			<td><?=$booked_trip->name; ?></td>
			<td><?=$booked_trip->title; ?></td>
			<td><?=$booked_trip->cost; ?>€</td>
			<td>
			<form class="cancelTrip" style="margin-bottom: 0;">
				<input type="hidden" name="booking_id" value="<?=$booked_trip->id ?>">
				<button class="btn btn-small btn-danger" type="submit">Cancel</button>
			</form>
			</td>
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

	$('.cancelTrip').submit(function(){
		
		var form = $(this);
		var button = form.children('button');
		button.prop('disabled', true);
		button.text('processing...');
		
		var faction = "<?=URL::to('user/cancel_trip'); ?>";
		var fdata = form.serialize();

		$.post(faction, fdata, function(json) {
			
			if (json.success) {
				button.text('canceled');
			} else {
				button.text('error');
			}			
		});
			
		return false;
	});

	$('#content').fadeIn(1000);
});

</script>
<?=render('includes.footer'); ?>
