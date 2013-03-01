<?=render('includes.header'); ?>
<?=render('includes.navbar', array('active' => 'book')); ?>
<div class="container">
<div class="content" id="content" style="display:none">
	<div class="page-header">
		<h2>Book Your Trips</h2>
	</div>
	<? foreach ($locations as $location): ?>
	<div class="row">
	<div class="span9 offset1">
		<form class="bookTrip">
		<input type="hidden" name="location" value="<?=$location->name; ?>">
		<table class="table table-bordered">
		<tbody>
		<tr class="info">
			<td colspan="3"><strong><?=$location->name; ?> Day <?=$location->day; ?></strong></td>
		</tr>
		</thead>
		<tbody>
		<? foreach ($trips[$location->name] as $trip): ?>
		<tr>
			<td><?=$trip->title; ?></td>
			<td><?=$trip->cost; ?>€</td>
			<td><input type="radio" name="<?=$location->name; ?>" value="<?=$trip->id ?>" required></td>
		</tr>
		<? endforeach; ?>
		</tbody>
		</table>
		<div class="pull-right">
			<button type="submit" class="btn btn-info btn-large" data-loading-text="processing...">
			<i class="icon-ok icon-white"></i> Book it</button>
		</div>
		
		<div class="alert alert-success" style="display: none; width:300px;"><strong>Successful</strong></div>
		<div class="alert alert-error" style="display: none; width:300px;"><strong>Error</strong></div>
		</form>	
	</div>
	</div>
	<br>
	<? endforeach; ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<?=HTML::script('js/bootstrap-button.js'); ?>
<script>
$(document).ready(function() {

	$('.bookTrip').submit(function(){
		
		var form = $(this);
		var form_button = form.find('button');
		var alert_success = form.find('.alert.alert-success');
		var alert_error = form.find('alert.alert-error');

		form_button.button('loading');
		alert_success.hide();
		alert_error.hide();
		
		var faction = "<?=URL::to('user/book_trip'); ?>";
		var fdata = form.serialize();

		$.post(faction, fdata, function(json) {
			
			if (json.success) {
				alert_success.show();
			} else {
				alert_error.show();
			}

			form_button.button('reset');			
		});
			
		return false;
	});

	$('#content').fadeIn(1000);
});
</script>
<?=render('includes.footer'); ?>
