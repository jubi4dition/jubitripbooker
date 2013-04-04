<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Trips Add</h2>
  </div>
  <div class="row">
  <div class="span6 offset3">
    <form id="formAdd" action="<?=URL::to('admin/trips/add'); ?>" method="post" class="well" accept-charset="utf-8">
      <input type="number" name="number" class="input-block-level" placeholder="Number" required min="100" max="999" autofocus>
      <select name="locationID" class="input-block-level">
        <? foreach ($locations as $location): ?>
          <option value="<?=$location->id; ?>"><?=$location->name; ?></option>
        <? endforeach; ?>
      </select>
      <input type="text" name="title" class="input-block-level" placeholder="Title" required maxlength="60">
      <input type="number" name="cost" class="input-block-level" placeholder="Cost" required>
      <button type="submit" class="btn btn-success btn-large">
      <i class="icon-plus icon-white"></i> Add Trip</button>
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

  $('#formAdd').submit(function() {

    var form = $(this);
    form.children('button').prop('disabled', true);

    $('#success').hide();
    $('#error').hide();

    var faction = "<?=URL::to('admin/trips/add'); ?>";
    var fdata = form.serialize();

    $.post(faction, fdata, function(json) {
        
        if (json.success) {
            $('#success').show();
        } else {
            $('#error').html(json.message);
            $('#error').show();
        }

        form.children('button').prop('disabled', false);
        form.children('input[name="name"]').select();
    });

    return false;
  });

  $('#nav-trips').addClass('active');

  $('#content').fadeIn(1000);
});
</script>
</body>
</html>
