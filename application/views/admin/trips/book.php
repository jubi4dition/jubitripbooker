<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Trips Book</h2>
  </div>
  <div class="row">
  <div class="span6 offset3">
    <form id="formBook" class="well" action="<?=Url::to('admin/trips/book'); ?>" method="post" accept-charset="utf-8">
      <p>Trip: <b><?=$trip->title; ?> (<?=$trip->number; ?>)</b></p>
      <input type="hidden" name="tripID" value="<?=$trip->id; ?>">
      <input type="number" name="number" class="input-block-level" placeholder="Number" required min="100000" max="999999" autofocus>
      <button type="submit" class="btn btn-block btn-success"><i class="icon-trash icon-white"></i> Book Trip</button>
    </form>
  </div>
  </div>
  <div id="status" class="row status-box">
    <div class="span6 offset3">
      <div id="success" class="alert alert-success hide">The trip has been booked!</div>
      <div id="error" class="alert alert-error hide">Error</div>
    </div>
  </div>
</div>
<?=render('includes.footer'); ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {
  
  $('#formBook').submit(function() {

    var form = $(this);
    form.children('button').prop('disabled', true);

    $('#success').hide();
    $('#error').hide();

    var faction = "<?=URL::to('admin/trips/book'); ?>";
    var fdata = form.serialize();

    $.post(faction, fdata, function(json) {
        
        if (json.success) {
            $('#success').show();
        } else {
            $('#error').html(json.message);
            $('#error').show();
        }

        form.children('button').prop('disabled', false);
    });

    return false;
  });

  $('#nav-trips').addClass('active');

  $('#content').fadeIn(1000);
  
});
</script>
</body>
</html>
