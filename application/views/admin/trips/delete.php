<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Trips Delete</h2>
  </div>
  <div class="row">
  <div class="span6 offset3">
    <form id="formDelete" class="well" action="<?=Url::to('admin/trips/delete'); ?>" method="post" accept-charset="utf-8">
      <input type="hidden" name="tripID" value="<?=$trip->id; ?>">
      <p>You really want to delete the Trip:<br><b><?=$trip->title; ?></b></p>
      <button type="submit" class="btn btn-block btn-danger"><i class="icon-trash icon-white"></i> Delete Trip</button>
    </form>
  </div>
  </div>
  <div id="status" class="row status-box">
    <div class="span6 offset3">
      <div id="success" class="alert alert-success hide">The trip has been added!</div>
      <div id="error" class="alert alert-error hide">Error</div>
    </div>
  </div>
</div>
<?=render('includes.footer'); ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {
  
  $('#formDelete').submit(function() {

    var form = $(this);
    form.children('button').prop('disabled', true);

    $('#success').hide();
    $('#error').hide();

    var faction = "<?=URL::to('admin/trips/delete'); ?>";
    var fdata = form.serialize();

    $.post(faction, fdata, function(json) {
        
        if (json.success) {
            $('#success').show();
        } else {
            $('#error').html(json.message);
            $('#error').show();
        }

    });

    return false;
  });

  $('#nav-trips').addClass('active');

  $('#content').fadeIn(1000);
  
});
</script>
</body>
</html>
